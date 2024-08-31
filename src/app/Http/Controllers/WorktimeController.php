<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worktime;
use Illuminate\Support\Facades\Auth;
use App\Models\Breaktime;
use Carbon\CarbonImmutable;
use App\Models\User;



class WorktimeController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::check())
        {
        $work = Worktime::where('user_id', Auth::id())->where('end_time', null)->exists();

        $break_in = Worktime::where('user_id', Auth::id())->whereDate('start_time', CarbonImmutable::today())->exists();

        $during_break = Breaktime::where('user_id', Auth::id())->where('end_time', null)->exists();

        $break_out = Breaktime::where('user_id',Auth::id())->whereDate('start_time',CarbonImmutable::today())->exists();

        return view('stamp', compact('work', 'break_in', 'during_break', 'break_out'));
        }else{
            return view('login');
        }
    }


    public function attendance(Request $request)
    {
        $base_date = $request->date;

        if(is_null($base_date))
        {
            $base_date = CarbonImmutable::today();
            $current = $base_date->format('Y-m-d');
            $yesterday = $base_date->subDay()->format('Y-m-d');
            $tomorrow = $base_date->addDay()->format('Y-m-d');
            $works = Worktime::with('user')->whereDate('end_time', $current)->paginate(5);

        }else{
            $carbon = new CarbonImmutable($base_date);
            $current = $carbon->format('Y-m-d');
            $yesterday = $carbon->subDay()->format('Y-m-d');
            $tomorrow = $carbon->addDay()->format('Y-m-d');

        }
            $works = Worktime::with('user')->whereDate('end_time', $base_date)->paginate(5);

            return view('worktime', compact('works', 'current', 'yesterday', 'tomorrow'));
    }

    public function list()
    {
        $users = User::select('id', 'name', 'email')->paginate(5);
        return view('users.list', compact('users'));
    }

    public function user(Request $request)
    {

        $base_date = $request->date;
        if(is_null($base_date))
        {
            $base_date = CarbonImmutable::today();
            $current = $base_date->format('Y-n');
            $last_month = $base_date->subMonth()->format('Y-n');
            $next_month = $base_date->addMonth()->format('Y-n');

            $target_year = $base_date->format('Y');
            $target_month = $base_date->format('n');
        }else{
            $carbon = new CarbonImmutable($base_date);
            $current = $carbon->format('Y-n');
            $last_month = $carbon->subMonth()->format('Y-n');
            $next_month = $carbon->addMonth()->format('Y-n');

            $target_year = $carbon->format('Y');
            $target_month = $carbon->format('n');
        }

        $user = $request->id;
        $works = Worktime::where('user_id', $user)->whereYear('start_time', $target_year)->whereMonth('start_time', $target_month)->paginate(5);
        $name = User::where('id', $user)->first();

        return view('users.user', compact('works', 'name', 'base_date', 'current', 'last_month', 'next_month'));
    }
    //
}

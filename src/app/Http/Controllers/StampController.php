<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worktime;
use Illuminate\Support\Facades\Auth;
use Carbon\CarbonImmutable;
use App\Models\Breaktime;
use App\Models\User;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;




class StampController extends Controller
{
    public function start()
    {
        Worktime::create([
            'user_id' => Auth::id(),
            'start_time' => CarbonImmutable::now(),
        ]);

        return redirect('/');
    }


    public function end()
    {
        $carbon = CarbonImmutable::today();
        Worktime::where('user_id', Auth::id())->whereDate('start_time', $carbon)->where('end_time',null)->update(['end_time' => CarbonImmutable::now()]);

        $works = Worktime::where('user_id', Auth::id())->whereDate('start_time', $carbon)->get();
        foreach($works as $work)
        {
            $start = $work->start_time;
            $end = $work->end_time;
        }

        $breaks = Breaktime::where('user_id', Auth::id())->whereDate('start_time', $carbon)->get();

        $array = [];
        foreach($breaks as $break)
        {
            $array[] = $break->total_time;
        }
        $break_total = array_sum($array);
        $break_total_time = gmdate('H:i:s', $break_total);

        $total = strtotime($end) - strtotime($start);
        $actual = $total - $break_total;
        $actual_time = gmdate('H:i:s', $actual);

        Worktime::where('user_id', Auth::id())->whereDate('start_time', CarbonImmutable::today())->update(['break_total_time' => $break_total_time, 'actual_working_time' => $actual_time]);

        return redirect('/');
    }


    public function break_in(Request $request)
    {
        $work = Worktime::where('user_id', Auth::id())->whereDate('start_time', CarbonImmutable::today())->exists();

        if($work)
        {
            Breaktime::create([
                'user_id' => Auth::id(),
                'start_time' => CarbonImmutable::now()
            ]);

        }else{
            return redirect('/')->with('message', '出勤してください');
        }

        return redirect('/');
    }

    public function break_out()
    {
        $work = Breaktime::where('user_id', Auth::id())->whereDate('start_time', CarbonImmutable::today())->exists();

        if($work)
        {
            $breaks = Breaktime::where('user_id', Auth::id())->whereDate('start_time', CarbonImmutable::today())->get();
            foreach($breaks as $break)
            {
                $break_in = $break->start_time;
                $total = (strtotime(CarbonImmutable::now()) - strtotime($break_in));
            }

            Breaktime::where('user_id', Auth::id())->where('end_time', null)->update(['end_time' => CarbonImmutable::now(), 'total_time' => $total]);
        }
        return redirect('/');
    }
}

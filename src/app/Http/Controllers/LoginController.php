<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Carbon\CarbonImmutable;



class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $user = $request;

        User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
        ]);

        Mail::to($request->email)->send(new SendMail($user));

        return view('auth.verify-email');
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $user = User::where('email', $email)->first();
        $email_verified_at = $user->email_verified_at;

        $credentials = ([
            'email' => $email,
            'password' => $request->password,
        ]);

        if(is_null($email_verified_at))
        {
            return redirect('/login')->with('message', '会員登録がお済みではではありません');
        }elseif(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function verify(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $user = User::where('name', $name)->where('email', $email)->first();
        $email_verified_at = $user->email_verified_at;

        if(is_null($email_verified_at))
        {
            User::where('name', $name)->where('email', $email)->update(['email_verified_at' => CarbonImmutable::today()]);

            return redirect('/login')->with('message', '会員登録が完了しました
            ');

        }else{
        return redirect('/login')->with('message', '会員登録はお済みです');
        }
    }
    //
}

@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"
>
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('content')
<div class="register">
    <div class="register-text">
        <p>会員登録</p>
    </div>
    <div class="register__form">
        <form class="register__form--item" action="/register/store" method="post">
            @csrf
            <input type="text" name="name" placeholder="名前">
                <div class="alert__message">
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            <input type="email" name="email" placeholder="メールアドレス">
                <div class="alert__message">
                    @error('email')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            <input type="password" name="password" placeholder="パスワード">
                <div class="alert__message">
                    @error('password')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
            <input type="password" name="password_confirmation" placeholder="確認用パスワード">
            <button>会員登録</button>
        </form>
    </div>
    <div class="register__have-account">
        <p>アカウントをお持ちの方はこちらから</p>
    </div>
    <div class="login-button">
        <a href="/login">ログイン</a>
    </div>
    <img src="../../../er.drawio.png" alt="">
</div>

@endsection
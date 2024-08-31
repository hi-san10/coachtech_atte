@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"
>
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@if(Auth::check())
@section('link')
<div class="link">
    <a class="link_item" href="user/list">ユーザー一覧</a>
</div>
@endsection
@endif

@section('content')
<div class="login">
    <div class="login-text">
        <p>ログイン</p>
    </div>
    @if(session('message'))
    <div class="error_message">
        <p class="error_message__content">{{ session('message') }}</p>
    </div>
    @endif
    <div class="login__form">
        <form action="login/login" method="post">
            @csrf
            <div class="login__form-content">
                <input type="email" name="email"  placeholder="メールアドレス">
                    <div class="alert__message">
                        @error('email')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                <input type="text" name="password" placeholder="パスワード">
                    <div class="alert__message">
                        @error('password')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                <button>ログイン</button>
            </div>
        </form>
    </div>
    <div class="login__no-account">
        <p>アカウントをお持ちでない方はこちらから</p>
    </div>
    <div class="login__no-account--a">
        <a href="/register">会員登録</a>
    </div>
</div>

@endsection
@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mail.css') }}">
@endsection

@section('content')
<div class="verify">
    <div class="verify__message">
        <p>会員登録ありがとうございます。<br>
        以下をクリックしてユーザー認証を完了してください</p>
    </div>
    <div class="verify__link">
        <a href="{{ route('verify', ['name' => $user->name, 'email' => $user->email]) }}">ユーザー認証へ</a>
    </div>
</div>
@endsection
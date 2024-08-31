@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/verify-email.css') }}">
@endsection

@section('link')
@endsection

@section('content')
<div class="verify-email">
    <div class="verify-email__content">
        <h1 class="verify-email__content--text">入力していただいたメールアドレス宛てに確認メールをお送りしました</h1>
    </div>
</div>
@endsection
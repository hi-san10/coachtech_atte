@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"
/>
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('link')
<div>
    <a href="/login">ホーム</a>
    <a href="/attendance">日付一覧</a>
    <form action="/logout" method="post">
        @csrf
        <button>ログアウト</button>
    </form>
</div>
@endsection

@section('content')
<div class="stamp">
    <div class="stamp__message">
    </div>
    <div class="stamp-content">
        <form action="/">
            <div class="stamp-content">
                <button>勤務開始</button>
            </div>
        </form>
        <form action="/">
            <div class="stamp-content">
                <button>勤務終了</button>
            </div>
        </form>
        <form action="/">
            <div class="stamp-content">
                <button>休憩開始</button>
            </div>
        </form>
        <form action="/">
            <div class="stamp-content">
                <button>休憩終了</button>
            </div>
        </form>
        <form action="/test" method="post">
            @csrf
            <button>test</button>
        </form>
    </div>
</div>
@endsection
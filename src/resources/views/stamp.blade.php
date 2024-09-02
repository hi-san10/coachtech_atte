@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/stamp.css') }}">
@endsection

@section('link')
<nav>
    <ul class="header__nav">
        <li><a class="header__nav-item" href="/login">ホーム</a></li>
        <li><a class="header__nav-item" href="/attendance">日付一覧</a></li>
        <li>
            <form action="/logout" method="post">
                @csrf
                <button class="header__nav-item" >ログアウト</button>
            </form>
        </li>
    </ul>
</nav>
@endsection

@section('content')
<div class="stamp">
    <div class="stamp__message">
        <p class="stamp__message-content">{{ \Auth::user()->name }}さんお疲れ様です！</p>
    </div>
    <div class="stamp__container">
        <form action="/start" method="post">
            @csrf
            <div class="stamp__container-item">
                @if($start)
                <button disabled>勤務開始</button>
                @else
                <button>勤務開始</button>
                @endif
            </div>
        </form>
        <form action="/end" method="post">
            @method('patch')
            @csrf
            <div class="stamp__container-item">
                @if($end)
                <button>勤務終了</button>
                @else
                <button disabled>勤務終了</button>
                @endif
            </div>
        </form>
        <form action="/break_in" method="post">
            @csrf
            <div class="stamp__container-item">
                @if(!$break_in)
                <button disabled>休憩開始</button>
                @elseif($during_break)
                <button disabled>休憩開始</button>
                @else
                <button>休憩開始</button>
                @endif
            </div>
        </form>
        <form action="/break_out" method="post">
            @method('patch')
            @csrf
            <div class="stamp__container-item">
                @if(!$break_out)
                <button disabled>休憩終了</button>
                @elseif($during_break)
                <button>休憩終了</button>
                @else
                <button disabled>休憩終了</button>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
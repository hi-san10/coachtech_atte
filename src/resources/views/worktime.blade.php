@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"
>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="{{asset('css/worktime.css')}}">
@endsection

@section('link')
<div class="nav_link">
    <div class="nav_link__content">
        <a class="link" href="/">ホーム</a>
        <a href="/attendance" class="link">日付一覧</a>
        <form action="/logout" method="post">
            @csrf
            <button class="link_button">ログアウト</button>
        </form>
    </div>
</div>
@endsection

@section('content')
<div class="worktime">
    <div class="worktime-date">
        <div class="worktime-date__content">
                <a href="{{ route('attendance', ['date' => $yesterday]) }}" class="allow">&lt;</a>
            <p>{{ $current }}</p>
                <a href="{{ route('attendance', ['date' => $tomorrow]) }}" class="allow">&gt;</a>
        </div>
    </div>
    <div class="worktime__content">
        <table>
            <tr class="worktime__content--list">
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>
            @foreach($works as $work)
            <tr class="worktime__content--list">
                <td class="name">{{ $work->user->name }}</td>
                <td>{{ $work->start_time->format('H:i:s') }}</td>
                <td>{{ $work->end_time->format('H:i:s') }}</td>
                <td>{{ $work->break_total_time }}</td>
                <td>{{ $work->actual_working_time }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="page">
        <div class="page__content">
            {{ $works->appends(request()->input())->Links() }}
        </div>
    </div>
</div>
@endsection


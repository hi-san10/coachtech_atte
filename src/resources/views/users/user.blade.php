@extends('layouts/app')

@section('css')
<link rel="stylesheet"
href="https://unpkg.com/modern-css-reset/dist/reset.min.css"
/>
<link rel="stylesheet" href="{{ asset('css/user.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

@endsection

@section('link')
<div class="link_nav">
    <a href="/login">ホーム</a>
    <a href="/attendance">日付一覧</a>
    <a href="/list">ユーザー一覧</a>
</div>
@endsection

@section('content')
<div class="user">
    <div class="user_name">
        <p>{{ $name->name }}さんの勤怠一覧</p>
    </div>
    <div class="date">
        <a class="date_link" href="{{ route('user', ['date' => $last_month, 'id' => $name->id]) }}">{{ $last_month }}月</a>
        <a class="date_link" href="">{{ $current }}月</a>
        <a class="date_link" href="{{ route('user', ['id' => $name->id, 'date' => $next_month]) }}">{{ $next_month }}月</a>
    </div>
    <div class="user_table">
        <table>
            <tr>
                <th class="head">出勤日</th>
                <th class="head">出勤時間</th>
                <th class="head">休憩時間</th>
                <th class="head">退勤時間</th>
                <th class="head">労働時間</th>
            </tr>
            @foreach($works as $work)
            <tr>
                <td>{{ $work->start_time->format('m-d') }}</td>
                <td>{{ $work->start_time->format('H:i:s') }}</td>
                <td>{{ $work->break_total_time }}</td>
                <td>{{ $work->end_time->format('H:i:s') }}</td>
                <td>{{ $work->actual_working_time }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="page">
        <div class="page_content">
            {{ $works->appends(request()->input())->Links() }}
        </div>
    </div>
</div>
@endsection
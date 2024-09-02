@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"
/>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endsection

@section('link')
<div class="link_nav">
    <a href="/">ホーム</a>
    <a href="/attendance">日付一覧</a>
</div>
@endsection

@section('content')
<div class="list">
    <div class="list_table">
        <table>
            <tr>
                <th>名前</th>
                <th>アドレス</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td class="name">
                    <a href="{{ route('user', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="page">
        <div class="page__content">
            {{ $users->appends(request()->input())->Links() }}
        </div>
    </div>

</div>
@endsection
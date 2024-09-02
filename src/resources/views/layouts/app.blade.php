<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="https://unpkg.com/modern-css-reset/dist/reset.min.css"
/>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>

<body>
    <header>
        <div class="header__inner">
            <h1 class="header__inner-title">Atte</h1>
            @yield('link')
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <hooter class="footer">
        <small>Atte,inc.</small>
    </hooter>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
    <title>Todoアプリ</title>
</head>
<body>
    <header class=header>
        <div class="header__inner">
            <div class="header__logo--outer">
                <a href="/" class="header__logo">
                    Todo
                </a>
            </div>
            <div class="header__link--outer">
                <a href="/categories" class="header__link">カテゴリ一覧</a>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
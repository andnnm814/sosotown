<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/reset.css">
    <link rel="stylesheet" href="/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v6.4.0/css/all.css" rel="stylesheet">
</head>
<body>
    <div id="app">
    <header>
        <div class="header-line">
            <h1><a href="/">SOSOTOWN</a></h1>
            <div class="header-line2">
                @guest
                <div class="swich-auth">
                    <a href="/login">ログイン</a>
                    <a href="/register">会員登録</a>
                </div>
                @endguest
                @auth
                <a href="{{ route('products.showLiked') }}"><i class="fa-solid fa-heart fa-color fa-1x"></i></a>
                <a href="{{ route('products.showCart') }}"><i class="fa-solid fa-cart-shopping fa-color fa-1x"></i></a>
                <form action="{{ route('logout') }}" method="post" class="swich-auth">
                    @csrf
                    <button type="submit" class="swich-auth auth-btn">ログアウト</button>
                </form>
                @endauth
            </div>
        </div>
    </header>
    <main class="site-width">
        @yield('main')
    </main>
    <footer>
        Copyright <a href="/">SOSOTOWN</a>. All Rights Reserved.
    </footer>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>

</body>
</html>
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
</head>
<body>
    <header>
        <h1><a href="/">SOSOTOWN</a></h1>
    </header>
    <main class="site-width">
        @yield('main')
    </main>
    <footer>
        Copyright <a href="/">SOSOTOWN</a>. All Rights Reserved.
    </footer>
</body>
</html>
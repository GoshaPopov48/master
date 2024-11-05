<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first laravell site</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <script src="{{asset('assets/js/bootstrap.min.js')}}" defer></script>
</head>
<body>
<header>
    <div class="container">
        @include('components.navbar')
    </div>
</header>
<main>
    <div class="container">
        @yield('main')
    </div>
</main>

</body>
</html>

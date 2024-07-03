<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body class="@yield('body-class')">
        <div class="content-wrapper">
            @yield('content')
        </div>
    <script src="https://kit.fontawesome.com/9d3634a4ff.js" crossorigin="anonymous"></script>
    @vite('resources/js/app.js')
</body>

</html>

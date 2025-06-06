<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header')
    <div class="container">
        @yield('content')
    </div>
    @include('includes.footer')
    @yield('script')
</body>
</html>
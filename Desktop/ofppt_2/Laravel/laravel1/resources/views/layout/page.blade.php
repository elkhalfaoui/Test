<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <style>
        .container {
            margin-top: 100px;
        }
        table, th, td {
            border: solid 1px black;
            border-collapse: collapse;
        }
        td, th {
            padding: 10px 20px;
        }
    </style>
    <title>@yield('title')</title>
</head>
<body>
    <header>
    <h1>Titre</h1>
    <ul>
        <li>one</li>
        <li>two</li>
        <li>three</li>
    </ul>
</header>

<section>
    @yield('contenu')
</section>

<footer>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste nihil eligendi necessitatibus!</p>
</footer>
</body>
</html>
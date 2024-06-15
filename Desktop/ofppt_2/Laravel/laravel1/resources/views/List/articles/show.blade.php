<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
    <style>
        h1{
            text-align: center;
            margin: 40px 0
        }
        a {
            display: block;
            margin: 20px auto;

        }
    </style>
</head>
<body>
    <h1 >Article {{$article->id}}</h1>
    <table class="table w-50 m-auto">
        <tr>
            <th>Champ</th>
            <th>Valeur</th>
        </tr>
        <tr>
            <td>Id</td>
            <td>{{$article->id}}</td>
        </tr>
        <tr>
            <td>Designation</td>
            <td>{{$article->designation}}</td>
        </tr>
        <tr>
            <td>Prix</td>
            <td>{{$article->prix}}</td>
        </tr>
        <tr>
            <td>Quantite</td>
            <td>{{$article->quantite}}</td>
        </tr>
    </table>
    <a href="{{route('articles.index')}}" class="btn btn-primary">Retourn</a>
</body>
</html>
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
    <title>Document</title>
</head>
<body>
   <div class="container">
     <table>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
        </tr>
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->titre}}</td>
                <td>{{$article->description}}</td>
                <td>{{$article->prix}}</td>
            </tr>

    </table>
    <a class="btn btn-primary" href="/articles">Retourne</a>
    <a class="btn btn-primary" href="{{route('articles.index')}}">Retourne</a>
   </div>
</body>
</html>
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
    @include('header')
   <div class="container">
    
    @if (session('message'))
        <p>{{session('message')}}</p>
    @endif
    <a href="{{route('articles.create')}}" class="btn btn-success">Ajouter un article</a>
    <br>
    
    <form action="{{route('articles.filter')}}" method="post">
        @csrf
        <div>
            <label for="">Rechercher</label>
            <input type="text" name="recherche" id="">
        </div>
        <input type="submit" value="Rechercher">
    </form>
    <br>
     <table>
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
        @forelse ($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->titre}}</td>
                <td>{{$article->description}}</td>
                <td>{{$article->prix}}</td>
                <td>
                    <a href="{{route('articles.show', $article->id)}}" class="btn btn-info">detail</a>
                    <a href="{{route('articles.edit', $article->id)}}" class="btn btn-info">Edit</a>
                    <a href="/articles/{{$article->id}}/edit" class="btn btn-info">Edit</a>
                    <form action="{{route('articles.destroy', $article->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
                
            </tr>
        @empty
            <tr colspan="5">
                <td>No value</td>
            </tr>
        @endforelse
    </table>
   </div>
</body>
</html>
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
    
    <form action="{{route('articles.update', $article->id)}}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="">Titre</label>
            <input type="text" name="titre" value="{{$article->titre}}">
        </div>
        <br>
        <div>
            <label for="">Description</label>
            <input type="text" name="description" value="{{old('description')}}">
        </div>
        <br>
        <div>
            <label for="">Prix</label>
            <input type="text" name="prix">
            @error('prix')
                <p style="color: red">{{$message}}</p>
            @enderror
        </div>
         <br>
        <input class="btn btn-success" type="submit" value="Edit">
    </form>
    <a class="btn btn-success" href="{{route('articles.index')}}">Retourne</a>
   </div>
</body>
</html>
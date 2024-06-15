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
    
    <form action="{{route('articles.store')}}" method="post">
        @csrf
        <div>
            <label for="">Titre</label>
            <input type="text" name="titre">
        </div>
        <br>
        <div>
            <label for="">Description</label>
            <input type="text" name="description">
        </div>
        <br>
        <div>
            <label for="">Prix</label>
            <input type="text" name="prix">
        </div>
         <br>
        <input class="btn btn-success" type="submit" value="Ajouter">
    </form>
   </div>
</body>
</html>
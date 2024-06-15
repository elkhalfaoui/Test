<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <H1>List des Filieres</H1>
    <ul>
        @foreach ($filieres as $f)
            <li><a href="/filiere/{{$f->id}}">{{$f->titre}}</a></li>
        @endforeach
    </ul>
</body>
</html>
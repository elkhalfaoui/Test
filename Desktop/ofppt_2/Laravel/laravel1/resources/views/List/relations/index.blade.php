<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>List des filiéres</h1>
    <ul>
        @foreach ($filieres as $filiere)
            <li><a href="{{route('filieres', $filiere->id)}}">{{$filiere->titre}}</a></li>
        @endforeach
    </ul>
</body>
</html>
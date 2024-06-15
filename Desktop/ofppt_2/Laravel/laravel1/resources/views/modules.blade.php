<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{$filiere->titre}}</h1>

    <h3>List des module {{count($filiere->modules)}}</h3>

    <ul>
        @foreach ($filiere->modules as $module)
            <li>{{$module->titre}}</li>
        @endforeach
    </ul>
    <h3>List des stagiaires {{count($filiere->stagiaires)}}</h3>

    <ul>
        @foreach ($filiere->stagiaires as $stagiaire)
            <li>{{$stagiaire->nom}} {{$stagiaire->prenom}}</li>
        @endforeach
    </ul>
</body>
</html>
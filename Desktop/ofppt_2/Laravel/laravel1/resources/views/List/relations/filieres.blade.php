<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Filiére: {{$filiere->titre}}</h1>
    <h3>List des modules ({{count($modules)}})</h3>
    <ul>
        @foreach ($modules as $module)
            <li>{{$module->titre}}</li>
        @endforeach
    </ul>
    <h3>List des stagiaires ({{count($stagiaires)}})</h3>
    <ul>
        @foreach ($stagiaires as $stagiaire)
            <li>{{$stagiaire->nom}} {{$stagiaire->prenom}} {{$stagiaire->telephone->numero}}</li>
        @endforeach
    </ul>
</body>
</html>
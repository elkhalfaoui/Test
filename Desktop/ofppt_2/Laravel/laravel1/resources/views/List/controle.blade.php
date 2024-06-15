<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <title>Document</title>
</head>
<body>
    @include('acceuil')
    <h1>List des Controles</h1>
    <table>
        <tr class="bg-primary">
            <th>Code</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Group</th>
        </tr>
        @foreach ($controles as $controle)
           <tr>
            <td>{{$controle['numero']}}</td>
            <td>{{$controle['codeModule']}}</td>
            <td>{{$controle['date']}}</td>
            <td>{{$controle['duree']}}</td>
        </tr> 
        @endforeach
        
    </table>
</body>
</html>
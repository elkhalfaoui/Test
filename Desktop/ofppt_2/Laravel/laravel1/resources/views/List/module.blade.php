<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('acceuil')
    <h1>List des Module</h1>
    <table>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Group</th>
        </tr>
        @foreach ($modules as $module)
           <tr>
            <td>{{$module['code']}}</td>
            <td>{{$module['intitule']}}</td>
            <td>{{$module['coef']}}</td>
            <td>{{$module['nombreHeures']}}</td>
        </tr> 
        @endforeach
        
    </table>
</body>
</html>
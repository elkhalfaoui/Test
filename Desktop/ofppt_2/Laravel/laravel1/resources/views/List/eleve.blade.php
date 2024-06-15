<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('acceuil')
    <h1>List des Eleve</h1>
    <table>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Group</th>
        </tr>
        @foreach ($eleves as $eleve)
           <tr>
            <td>{{$eleve['code']}}</td>
            <td>{{$eleve['nom']}}</td>
            <td>{{$eleve['prenom']}}</td>
            <td>{{$eleve['group']}}</td>
        </tr> 
        @endforeach
        
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- {{Hash::make('0000')}} --}}
    <h1>Se connecter</h1>
    <form action="{{route('loginPost')}}" method="post">
        @csrf
        <label for="">Email</label>
        <input type="email" name="email" id="">
        <label for="">Mot de pass</label>
        <input type="password" name="password" id="">
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
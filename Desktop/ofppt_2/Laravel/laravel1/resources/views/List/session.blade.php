<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <p>
        {{Session::get('message')}}
    </p>
    
    <form action="{{route('sessionStore')}}" method="post">
        @csrf
        <input type="text" name="login" placeholder="Login">
        <input type="password" name="password" placeholder="Mot de pass">
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
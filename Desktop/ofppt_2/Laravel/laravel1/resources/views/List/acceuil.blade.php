<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Bienvenue</h1>
   <form action="{{route('logout')}}" method="POST">
    @csrf
    <input type="submit" value="logout">
   </form>
</body>
</html>
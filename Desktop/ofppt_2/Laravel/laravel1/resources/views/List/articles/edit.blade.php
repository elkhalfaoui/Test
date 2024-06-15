<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('articles.update', $article->id)}}" method="POST">
        @csrf
        @method('PUT')
        <h1>update</h1>
        <div class="form-group">
            <label for="">Designation</label>
            <input type="text" name="designation" required>
        </div>
        <div class="form-group">
            <label for="">Prix</label>
            <input type="text" name="prix" required>
        </div>
        <div class="form-group">
            <label for="">Quantite</label>
            <input type="number" name="quantite" required>
        </div>
        <input type="submit" value="Update">
    </form>
</body>
</html>
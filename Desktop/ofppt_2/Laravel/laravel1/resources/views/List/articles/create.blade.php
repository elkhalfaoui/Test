<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action={{route("articles.store")}} method="POST">
        @csrf
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
        <input type="submit" value="Ajouter">
    </form>
</body>
</html>
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
    <div class="container"> 
        <h1>formulaire</h1>
        <form action="{{route('create_article')}}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- @if ($errors->any())
        <div>
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif                 --}}
            <div class="row-6">
                <div class="col mb-3">
                    <label for="" class="form-label">Titre :</label>
                </div>
                <div class="col mb-3">
                    <input name="titre" type="text" class="form-controll" value="{{old('titre')}}">
                    @error('titre')
                        <span class="text-danger">
                            {{$message}}
                </span>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label for="" class="form-label">Contenu :</label>
                </div>
                <div class="col mb-3">
                    <input name="contenu" type="text" class="form-controll" value="{{old('contenu')}}">
                    @error('contenu')
                        <span class="text-danger">
                            {{$message}}
                </span>
                    @enderror
                </div>
        
                <div class="col mb-3">
                    <label for="" class="form-label">Image</label>
                </div>
        
                <div class="col mb-3">
                    <input name="image" type="file" class="form-controll" value="{{old('image')}}">
                    @error('image')
                        <span class=" text-danger">
                            {{$message}}
                </span>
                    @enderror
                </div>
                
            </div>
            <input type="submit" value="Ajouter" class="btn btn-success">
        </form>
    </div>
</body>
</html>
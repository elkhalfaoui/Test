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
        <form action="{{route('validation')}}" method="post">
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
                    <label for="" class="form-label">Nom :</label>
                </div>
                <div class="col mb-3">
                    <input name="nom" type="text" class="form-controll" value="{{old('nom')}}">
                    @error('nom')
                        <span class="text-danger">
                            {{$message}}
                </span>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label for="" class="form-label">Email</label>
                </div>
                <div class="col mb-3">
                    <input name="email" type="email" class="form-controll" value="{{old('email')}}">
                    @error('email')
                        <span class="text-danger">
                            {{$message}}
                </span>
                    @enderror
                </div>
        
                <div class="col mb-3">
                    <label for="" class="form-label">Sujet</label>
                </div>
        
                <div class="col mb-3">
                    <input name="sujet" type="text" class="form-controll" value="{{old('sujet')}}">
                    @error('sujet')
                        <span class=" text-danger">
                            {{$message}}
                </span>
                    @enderror
                </div>
                <div class="col mb-3">
                    <label for="" class="form-label">Message</label>
                </div>
                <div class="col mb-3">
                    <textarea name="message" class="form-controll" cols="30" rows="6" value="{{old('message')}}"></textarea>
                    @error('message')
                        <span class="text-danger">
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
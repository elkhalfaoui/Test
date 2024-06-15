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
        <form action="{{route('exercice3')}}" method="post" enctype="multipart/form-data">
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
            <div class="row my-4">
                <div class="col-6 d-flex justify-content-between">
                    <label for="" class="form-label">First Name :</label>
                    <input name="first_name" type="text" class="form-controll" value="{{old('first_name')}}"
                    @error ('first_name')
                    style='border: red 1px solid'
                    @enderror>
                    @error('first_name')
                        <p class="text-danger">
                            {{$message}}
                </p>
                    @enderror
                </div>
                <div class="col-6 d-flex justify-content-between">
                    <label for="" class="form-label">Last Name :</label>
                    <input name="last_name" type="text" class="form-controll" value="{{old('last_name')}}">
                    @error('last_name')
                        <p class="text-danger">
                            {{$message}}
                </p>
                    @enderror
                </div>
            </div>
            <div class="row my-4">
                <div class="col-6 d-flex justify-content-between">
                    <label for="" class="form-label">Email :</label>
                    <input name="email" type="email" class="form-controll" value="{{old('email')}}">
                    @error('email')
                        <p class="text-danger">
                            {{$message}}
                </p>
                    @enderror
                </div>
                <div class="col-6 d-flex justify-content-between">
                    <label for="" class="form-label">Mobile Number :</label>
                    <input name="mobile" type="text" class="form-controll" value="{{old('mobile')}}">
                    @error('mobile')
                        <p class="text-danger">
                            {{$message}}
                </p>
                    @enderror
                </div>
            </div>
            <div class="row my-4">
                <div class="col-6 d-flex justify-content-between">
                    <label for="" class="form-label">Password :</label>
                    <input name="password" type="password" class="form-controll" value="{{old('password')}}">
                    @error('password')
                        <p class="text-danger">
                            {{$message}}
                </p>
                    @enderror
                </div>
                <div class="col-6 d-flex justify-content-between">
                    <label for="" class="form-label">Confirme Password :</label>
                    <input name="confirm" type="text" class="form-controll" value="{{old('confirm')}}">
                    @error('confirm')
                        <p class="text-danger">
                            {{$message}}
                </p>
                    @enderror
                </div>
            </div>
            <div class="row my-4">
                <div class="col-6 d-flex justify-content-between">
                    <label for="" class="form-label">About :</label>
                    <textarea name="about" id="" cols="30" rows="10"></textarea>
                    @error('about')
                        <p class="text-danger">
                            {{$message}}
                </p>
                    @enderror
                </div>
            </div>

            <input type="submit" value="Ajouter" class="btn btn-success">
        </form>
    </div>
</body>
</html>
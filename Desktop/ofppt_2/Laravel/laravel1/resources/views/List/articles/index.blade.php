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
    <h1>List des articles</h1>
    @if (@session('message1'))
        <p class="alert alert-success">{{@session('message1')}}</p>
    @endif
    <a href="{{route('articles.create')}}" class="btn btn-primary">create</a>
    <table class="table w-50 m-auto">
        <tr>
            <td>Id</td>
            <td>Designation</td>
            <td>Prix</td>
            <td>Quantite</td>
            <td>Action</td>
        </tr>
        @foreach ($articles as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->designation}}</td>
            <td>{{$item->prix}}</td>
            <td>{{$item->quantite}}</td>
            <td>
                <a href="{{route('articles.show', $item->id)}}" class="btn btn-primary">plus de details</a>
                {{-- <a href="{{route('articles.destroy', $item->id)}}" class="btn btn-danger">Delete</a> --}}
                <a href="{{route('articles.edit', $item->id)}}" class="btn btn-warning">Edit</a>
                <form action="{{route('articles.destroy', $item->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    {{-- <input type="hidden" name="id" value="{{$item->id}}"> --}}
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
</body>
</html>
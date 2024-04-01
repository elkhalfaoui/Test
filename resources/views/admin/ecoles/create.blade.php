@extends('layouts.master')

@section('title', 'Ajout Ecole')

@section('content')
    <h1 class="mb-0">Ajout Ecole</h1>
    <hr />
    <form action="{{ route('admin.ecoles.store') }}" method="POST"{{--  enctype="multipart/form-data" --}}>
        @csrf
        @if ($errors->any())
            <div>
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row mb-3">

            {{-- <th>CNIE</th>
                <th>Email</th> --}}
            <div class="col">
                <input type="text" name="sigle" class="form-control" placeholder="Sigle...">
            </div>
            <div class="col">
                <input type="text" name="nom" class="form-control" placeholder="Nom...">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="email" class="form-control" placeholder="Email...">
            </div>
            <div class="col">
                <input type="tel" id="telephone" class="form-control" name="telephone" placeholder="N° Téléphone..." />
            </div>
        </div>

        <div class="row">
            <div class="col">
                <input type="number" class="form-control" name="effectif_accueil" placeholder="Effectif Accueil">
            </div>
            <div class="col col-md-6">
                <textarea name="adresse" class="form-control" placeholder="Adresse de l'école..."></textarea>
            </div>
        </div>
        <div class="row mt-4 mr-4 float-right">
            <button type="submit" class="btn btn-block btn-primary">Ajouter Ecole</button>
        </div>
    </form>
@endsection

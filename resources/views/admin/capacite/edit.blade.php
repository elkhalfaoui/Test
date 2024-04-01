@extends('layouts.master')

@section('title', 'Modifier Capacité')

@section('content')
    <h1 class="mb-0">Modifier Capacité</h1>
    <hr />
    <form  action="{{ route('admin.capacite.update', $capacite->id) }}" method="POST">
        @csrf
        @method('PUT')
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
            <div class="col">
                <label for="etablissement">Etablissement</label>
                <select id="etablissement" class="form-control" name="etablissement">
                    <option selected value="{{ $capacite->etablissement }}" >{{ $capacite->etablissement }}</option>
                </select>
            </div>
            <div class="col">
                <label for="service">Service</label>
                <select id="service" class="form-control" name="service">
                    <option selected value="{{ $capacite->service }}">{{ $capacite->service }}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Filière</label>
                <input type="text" name="filiere" class="form-control" placeholder="Filière..."
                    value="{{ $capacite->filiere }}">
            </div>
            <div class="col">
                <label class="form-label">Niveau d'études</label>
                <input type="text" name="niveau_etudes" class="form-control" placeholder="Niveau études..."
                    value="{{ $capacite->niveau_etudes }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="capaciteP1">Capacité 8H-12H(P1)</label>
                <input type="number" name="capaciteP1" placeholder="Capacité P1..." value="{{ $capacite->capaciteP1 }}">
            </div>
            <div class="col">
                <label for="capaciteP2">Capacité 12H-16H(P2)</label>
                <input type="number" name="capaciteP2" placeholder="Capacité P2..." value="{{ $capacite->capaciteP2 }}">
            </div>
            <div class="col">
                <label for="capaciteP3">Capacité 16H-20H(P3)</label>
                <input type="number" name="capaciteP3" placeholder="Capacité P3..." value="{{ $capacite->capaciteP3 }}">
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="d-grid mr-3">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </div>
        </div>
    </form>
@endsection

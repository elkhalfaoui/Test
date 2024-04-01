@extends('layouts.servicemaster')

@section('title', 'Renseigner Capacité')

@section('content')
    <h1 class="mb-0">Renseigner la capacité du service</h1>
    <hr />
    <form action="{{ route('service.capacite.store') }}" method="POST">
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
            <div class="col">
                <label for="etablissement">Etablissement</label>
                <select id="etablissement" class="form-control" name="etablissement">
                    <option selected value="{{ $etablissement }}" >{{ $etablissement }}</option>
                </select>
            </div>
            <div class="col">
                <label for="service">Service</label>
                <select id="service" class="form-control" name="service">
                    <option selected value="{{ $service }}">{{ $service }}</option>
                </select>
            </div>
        </div>



        <div class="row mb-3">
            <div class="col">
                <label for="filiere">Filière</label>
                <input type="text" name="filiere" class="form-control" placeholder="Filière...">
            </div>
            <div class="col">
                <label for="niveau_etudes">Niveau D'études</label>
                <input type="text" name="niveau_etudes" class="form-control" placeholder="Niveau études...">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="capaciteP1">Capacité 8h-12h (P1)</label>
                <input type="number" name="capaciteP1" class="form-control" placeholder="Capacité 8h-12h...">
            </div>
            <div class="col">
                <label for="capaciteP2">Capacité 12h-16h (P2)</label>
                <input type="number" name="capaciteP2" class="form-control" placeholder="Capacité 12h-16h...">
            </div>
            <div class="col">
                <label for="capaciteP3">Capacité 16h-20h (P3)</label>
                <input type="number" name="capaciteP3" class="form-control" placeholder="Capacité 16h-20h...">
            </div>
        </div>
        <div class="row mt-4 mr-4 float-right">
            <button type="submit" class="btn btn-block btn-primary">Renseigner capacité</button>
        </div>
    </form>
@endsection

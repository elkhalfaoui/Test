@extends('layouts.servicemaster')

@section('title', 'Détails Capacité')

@section('content')
    <h1 class="mb-0">Détails Capacité</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Etablissement</label>
            <input type="text" name="etablissement" class="form-control" placeholder="Etablissement" readonly value="{{ $capacite->etablissement }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Service</label>
            <input type="text" name="service" class="form-control" placeholder="Service" readonly
                value="{{ $capacite->service }}">
        </div>
    </div>
   
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Filière</label>
            <input type="text" name="filiere" class="form-control" placeholder="Filière"
                value="{{ $capacite->filiere }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Niveau d'études</label>
            <input type="text" name="niveau_etudes" class="form-control" placeholder="Niveau d'études" readonly
                value="{{ $capacite->niveau_etudes }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Capacité 8H-12H(P1)</label>
            <input type="text" class="form-control" name="capaciteP1" placeholder="Capacité P1" readonly
                value="{{ $capacite->capaciteP1 }}" />
        </div>
        <div class="col mb-3">
            <label class="form-label">Capacité 12H-16H(P2)</label>
            <input class="form-control" name="capaciteP2" placeholder="Capacité P2" readonly value=" {{ $capacite->capaciteP2 }}" />
        </div>
        <div class="col mb-3">
            <label class="form-label">Capacité 16H-20H(P3)</label>
            <input type="text" class="form-control" name="capaciteP3" placeholder="Capacité P3" readonly
                value="{{ $capacite->capaciteP3 }}" />
        </div>
    </div>
    <div class="row">
        <div class="col ">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" readonly
                value="{{ $capacite->created_at }}">
        </div>
        <div class="col ">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" readonly
                value="{{ $capacite->updated_at }}">
        </div>
    </div>   
@endsection

@extends('layouts.master')

@section('title', 'Détails Demande')

@section('content')
    <h1 class="mb-0">Détails Demande</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" readonly value="{{ $demande->nom }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" readonly
                value="{{ $demande->prenom }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" readonly
                value="{{ $demande->email }}" />
        </div>
        <div class="col mb-3">
            <label class="form-label">Téléphone</label>
            <input type="text" name="telephone" class="form-control" placeholder="Téléphone"
                value="{{ $demande->telephone }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Service</label>
            <input type="text" name="created_at" class="form-control" placeholder="Service"
                value="{{ $demande->service }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Etablissement</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Etablissement"
                value="{{ $demande->etablissement }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">PPR :</label>
            <input type="text" name="ppr" class="form-control" placeholder="PPR..."
                value="{{ $demande->ppr }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Demande Faite le :</label>
            <input type="text" name="created_at" class="form-control" placeholder="Service"
                value="{{ $demande->created_at }}" readonly>
        </div>
    </div>
@endsection

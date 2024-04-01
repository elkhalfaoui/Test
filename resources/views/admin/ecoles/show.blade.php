@extends('layouts.master')

@section('title', 'Détails Compte')

@section('content')
    <h1 class="mb-0">Détails Compte</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" readonly value="{{ $compte->nom }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" readonly
                value="{{ $compte->prenom }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">PPR</label>
            <input type="text" name="ppr" class="form-control" placeholder="PPR Utilisateur" readonly
                value="{{ $compte->ppr }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Téléphone</label>
            <input class="form-control" name="telephone" placeholder="Téléphone" readonly value=" {{ $compte->telephone }}" />
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" readonly
                value="{{ $compte->email }}" />
        </div>
        <div class="col mb-3">
            <label class="form-label">Mot de Passe</label>
            <input type="password" name="password" class="form-control" placeholder="Mot de Passe" readonly
                value="{{ $compte->password }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Service</label>
            <input type="text" name="created_at" class="form-control" placeholder="Service"
                value="{{ $compte->service }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Etablissement</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Etablissement"
                value="{{ $compte->etablissement }}" readonly>
        </div>
    </div>
@endsection

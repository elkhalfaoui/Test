@extends('layouts.servicemaster')

@section('title', 'Détails Stagiaire')

@section('content')
    <h1 class="mb-0">Détails Stagiaire</h1>
    <hr />
    <div class="row m-4">
        <img src="{{ $stagiaire->getImageUrl() }}" alt="" class="rounded">
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Nom" readonly value="{{ $stagiaire->nom }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Prénom" readonly
                value="{{ $stagiaire->prenom }}">
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Email" readonly
                value="{{ $stagiaire->email }}" />
        </div>
        <div class="col mb-3">
            <label class="form-label">Téléphone</label>
            <input class="form-control" name="telephone" placeholder="Téléphone" readonly value=" {{ $stagiaire->telephone }}" />
        </div>
    </div>
    <div class="row mt-4">
        <div class="col mb-3">
            <label class="form-label">Etablissement</label>
            <input type="text" name="etablissement" class="form-control" placeholder="Etablissement de stage" readonly
                value="{{ $stagiaire->etablissement }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Service</label>
            <input type="text" name="service" class="form-control" placeholder="Service"
                value="{{ $stagiaire->service }}" readonly>
        </div>
        
    </div>
   
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Etablissement d'origine</label>
            <input type="text" name="etablissement_origine" class="form-control" placeholder="Etablissement d'origine'" readonly
                value="{{ $stagiaire->etablissement_origine }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Type de stage</label>
            <input type="text" name="type_stage" class="form-control" placeholder="Type de stage"
                value="{{ $stagiaire->type_stage }}" readonly>
        </div>   
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Niveau d'études</label>
            <input type="text" name="niveau_etudes" class="form-control" placeholder="Niveau d'études" readonly
                value="{{ $stagiaire->niveau_etudes }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Status système du stagiaire</label>
            <input type="text" name="status" class="form-control" placeholder="Status stagiaire"
                value="{{ $stagiaire->status }}" readonly>
        </div>   
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Date de début du stage</label>
            <input type="text" name="date_debut" class="form-control" placeholder="Date de début du stage" readonly
                value="{{ $stagiaire->date_debut }}">
        </div>
        <div class="col mb-3">
            <label class="form-label">Date de fin du stage</label>
            <input type="text" name="date_fin" class="form-control" placeholder="Date de fin du stage"
                value="{{ $stagiaire->date_fin }}" readonly>
        </div>   
    </div>
    <div class="row">
        <div class="col ">
            <label class="form-label">Sujet du stage</label>
            <input type="text" name="sujet" class="form-control" placeholder="Sujet du stage" readonly
                value="{{ $stagiaire->sujet }}">
        </div>
           
    </div>   
@endsection

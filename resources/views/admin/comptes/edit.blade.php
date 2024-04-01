@extends('layouts.master')

@section('title', 'Modifier Compte')

@section('content')
    <h1 class="mb-0">Modifier Compte</h1>
    <hr />
    <form enctype="multipart/form-data" action="{{ route('admin.comptes.update', $compte->id) }}" method="POST">
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
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ $compte->nom }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" placeholder="Prénom"
                    value="{{ $compte->prenom }}">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">PPR</label>
                <input type="text" name="ppr" class="form-control" placeholder="PPR Utilisateur"
                    value="{{ $compte->ppr }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Téléphone</label>
                <input class="form-control" name="telephone" placeholder="Téléphone" value=" {{ $compte->telephone }}" />
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email"
                    value=" {{ $compte->email }}" />
            </div>
            <div class="col mb-3">
                <label class="form-label">Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe"
                    value="{{ $compte->password }}" readonly>
            </div>

        </div>
        <div class="row mb-3">
            <div class="col">
                <select id="etablissement" class="form-control" name="etablissement">
                    <option selected value="{{ $compte->etablissement }}">{{ $compte->etablissement }}</option>
                    @foreach ($etablissement as $etablissement)
                        <option value="{{ $etablissement->etablissement }}">
                            {{ $etablissement->etablissement }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select id="service" class="form-control" name="service">
                    <option selected value="{{ $compte->service }}">{{ $compte->service }}</option>
                    <optgroup label = "ADM">
                        @foreach ($servicesADM as $servicesADM)
                            <option value="{{ $servicesADM->lib_complet }}">
                                {{ $servicesADM->etablissement }} - {{ $servicesADM->uo }} -
                                {{ $servicesADM->lib_complet }}</option>
                        @endforeach
                    <optgroup label = "MEDIC">
                        @foreach ($servicesMEDIC as $servicesMEDIC)
                            <option value="{{ $servicesMEDIC->lib_complet }}">
                                {{ $servicesMEDIC->etablissement }} - {{ $servicesMEDIC->uo }} -
                                {{ $servicesMEDIC->lib_complet }}</option>
                        @endforeach
                    <optgroup label = "MDCRC">
                        @foreach ($servicesMDCRC as $servicesMDCRC)
                            <option value="{{ $servicesMDCRC->lib_complet }}">
                                {{ $servicesMDCRC->etablissement }} - {{ $servicesMDCRC->uo }} -
                                {{ $servicesMDCRC->lib_complet }}</option>
                        @endforeach
                    <optgroup label = "DAF">
                        @foreach ($servicesDAF as $servicesDAF)
                            <option value="{{ $servicesDAF->lib_complet }}">
                                {{ $servicesDAF->etablissement }} - {{ $servicesDAF->uo }} -
                                {{ $servicesDAF->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DAP">
                        @foreach ($servicesDAP as $servicesDAP)
                            <option value="{{ $servicesDAP->lib_complet }}">
                                {{ $servicesDAP->etablissement }} - {{ $servicesDAP->uo }} -
                                {{ $servicesDAP->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DIA">
                        @foreach ($servicesDIA as $servicesDIA)
                            <option value="{{ $servicesDIA->lib_complet }}">
                                {{ $servicesDIA->etablissement }} - {{ $servicesDIA->uo }} -
                                {{ $servicesDIA->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DOEHRSI">
                        @foreach ($servicesDOEHRSI as $servicesDOEHRSI)
                            <option value="{{ $servicesDOEHRSI->lib_complet }}">
                                {{ $servicesDOEHRSI->etablissement }} - {{ $servicesDOEHRSI->uo }} -
                                {{ $servicesDOEHRSI->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DOSAP">
                        @foreach ($servicesDOSAP as $servicesDOSAP)
                            <option value="{{ $servicesDOSAP->lib_complet }}">
                                {{ $servicesDOSAP->etablissement }} - {{ $servicesDOSAP->uo }} -
                                {{ $servicesDOSAP->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DPHI">
                        @foreach ($servicesDPHI as $servicesDPHI)
                            <option value="{{ $servicesDPHI->lib_complet }}">
                                {{ $servicesDPHI->etablissement }} - {{ $servicesDPHI->uo }} -
                                {{ $servicesDPHI->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DPI">
                        @foreach ($servicesDPI as $servicesDPI)
                            <option value="{{ $servicesDPI->lib_complet }}">
                                {{ $servicesDPI->etablissement }} - {{ $servicesDPI->uo }} -
                                {{ $servicesDPI->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DRF">
                        @foreach ($servicesDRF as $servicesDRF)
                            <option value="{{ $servicesDRF->lib_complet }}">
                                {{ $servicesDRF->etablissement }} - {{ $servicesDRF->uo }} -
                                {{ $servicesDRF->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DRHDPC">
                        @foreach ($servicesDRHDPC as $servicesDRHDPC)
                            <option value="{{ $servicesDRHDPC->lib_complet }}">
                                {{ $servicesDRHDPC->etablissement }} - {{ $servicesDRHDPC->uo }} -
                                {{ $servicesDRHDPC->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "DSIH">
                        @foreach ($servicesDSIH as $servicesDSIH)
                            <option value="{{ $servicesDSIH->lib_complet }}">
                                {{ $servicesDSIH->etablissement }} - {{ $servicesDSIH->uo }} -
                                {{ $servicesDSIH->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "SG">
                        @foreach ($servicesSG as $servicesSG)
                            <option value="{{ $servicesSG->lib_complet }}">
                                {{ $servicesSG->etablissement }} - {{ $servicesSG->uo }} -
                                {{ $servicesSG->lib_complet }}
                            </option>
                        @endforeach
                    <optgroup label = "PSY">
                        @foreach ($servicesPSY as $servicesPSY)
                            <option value="{{ $servicesPSY->lib_complet }}">
                                {{ $servicesPSY->etablissement }} - {{ $servicesPSY->uo }} -
                                {{ $servicesPSY->lib_complet }}
                            </option>
                        @endforeach
                </select>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <i class="form__icon fas fa-image fa-lg text-blue centered m-3"></i>
            <input type="file" class="form__input centered m-2" name="image">
        </div>
        <div class="row justify-content-center mt-4">
            <div class="d-grid mr-3">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </div>
            <div class="d-grid">
                <a href="{{ route('admin.genererMDP', $compte->id) }}" type="button" class="btn btn-info">Générer un nouveau
                    mot
                    de passe</a>
            </div>
        </div>
    </form>
@endsection

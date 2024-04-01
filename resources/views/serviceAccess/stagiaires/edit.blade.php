@extends('layouts.servicemaster')

@section('title', 'Modifier Stagiaire')

@section('content')
    <h1 class="mb-0">Modifier Stagiaire</h1>
    <hr />
    <form enctype="multipart/form-data" action="{{ route('service.stagiaires.update', $stagiaire->id) }}" method="POST">
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
                <input type="text" name="nom" class="form-control" placeholder="Nom" value="{{ $stagiaire->nom }}">
            </div>
            <div class="col mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" name="prenom" class="form-control" placeholder="Prénom"
                    value="{{ $stagiaire->prenom }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Type de stage</label>
                <select id="type_stage" class="form-control" name="type_stage">
                    <option selected value="{{ $stagiaire->type_stage }}">Type de stage</option>
                    <option value="Conventionné">Conventionné</option>
                    <option value="Bénévole">Bénévole</option>

                </select>
            </div>
            <div class="col">
                <label class="form-label">Etablissement d'origine</label>
                <select id="etablissement_origine" class="form-control" name="etablissement_origine">
                    <option selected value="{{ $stagiaire->etablissement_origine }}">Etablissement d'origine...
                    </option>
                    @foreach ($ecoles as $ecoles)
                        <option value="{{ $ecoles->nom }}">
                            {{ $ecoles->nom }}
                        </option>
                    @endforeach

                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email"
                    value=" {{ $stagiaire->email }}" />
            </div>
            <div class="col mb-3">
                <label class="form-label">Téléphone</label>
                <input class="form-control" name="telephone" placeholder="Téléphone" value=" {{ $stagiaire->telephone }}" />
            </div>

        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Etablissement de stage</label>
                <select id="etablissement" class="form-control" name="etablissement">
                    <option selected value="{{ $stagiaire->etablissement }}">{{ $stagiaire->etablissement }}</option>
                    @foreach ($etablissement as $etablissement)
                        <option value="{{ $etablissement->etablissement }}">
                            {{ $etablissement->etablissement }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label class="form-label">Service de stage</label>
                <select id="service" class="form-control" name="service">
                    <option selected value="{{ $stagiaire->service }}">{{ $stagiaire->service }}</option>
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
        <div class="row">
            <div class="col">
                <label class="form-label">Filière</label>
                <input type="text" name="filiere" class="form-control" placeholder="Filière..."
                    value="{{ $stagiaire->filiere }}">
            </div>
            <div class="col">
                <label class="form-label">Niveau d'études</label>
                <input type="text" name="niveau_etudes" class="form-control" placeholder="Niveau études..."
                    value="{{ $stagiaire->niveau_etudes }}">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col ">
                <label class="form-label">Sujet du stage</label>
                <textarea name="sujet" class="form-control" placeholder="Sujet du stage">{{ $stagiaire->sujet }}</textarea>
            </div>
            <div class="col mt-4">
                <i class="form__icon fas fa-image fa-lg text-blue centered m-3"></i>
                <input type="file" class="form__input centered m-2" name="image">
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="d-grid mr-3">
                <button type="submit" class="btn btn-warning">Modifier</button>
            </div>
        </div>
    </form>
@endsection

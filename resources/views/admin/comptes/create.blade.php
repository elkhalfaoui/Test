@extends('layouts.master')

@section('title', 'Création Compte')

@section('content')
    <h1 class="mb-0">Création Compte</h1>
    <hr />
    <form action="{{ route('admin.comptes.store') }}" method="POST"{{--  enctype="multipart/form-data" --}}>
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
                <input type="text" name="nom" class="form-control" placeholder="Nom...">
            </div>
            <div class="col">
                <input type="text" name="prenom" class="form-control" placeholder="Prénom...">
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

        <div class="row mb-3">
            <div class="col">
                <select id="etablissement" class="form-control" name="etablissement">
                    <option selected disabled>Etablissement...</option>
                    @foreach ($etablissement as $etablissement)
                        <option value="{{ $etablissement->etablissement }}">
                            {{ $etablissement->etablissement }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select id="service" class="form-control" name="service">
                    <option selected>Service...</option>
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
        <div class="row d-flex justify-content-center mt-4">

            <div class="col d-flex justify-content-center col-md-6">
                <input type="text" name="ppr" class="form-control" placeholder="PPR...">
            </div>
        </div>
        <div class="row mt-4 mr-4 float-right">

            <button type="submit" class="btn btn-block btn-primary">Créer Compte</button>

        </div>
    </form>
@endsection

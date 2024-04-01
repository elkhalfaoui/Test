@extends('layouts.app')

@section('content')
    <div class="conteneur screen-container">
        <div class="screen1">
            <div class="screen__content">

                <img class="manImg" src="{{ asset('images/logoCHU.png') }}" alt="Logo CHU" />

                <form class="login" method="POST" action="{{ route('login') }}">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="text" class="login__input" name="email" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" class="login__input" name="password" placeholder="Mot de passe">
                    </div>
                    <button class="button login__submit col-md-6">
                        <span class="button__text">Connexion</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                <div class="social-login">
                    <h3>Pas de compte ?</h3>
                    <div class="social-icons">
                        <a class="social-login__icon" data-toggle="modal" data-target="#exampleModal">Demander un
                            compte</a>
                    </div>
                </div>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="row d-flex">
                            <div class="col-md-11">
                                <h4 class="modal-title" id="exampleModalLabel">Demande de création de compte
                                </h4>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-danger float-right " data-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('demandeCompte.store') }}" method="POST">
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
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" placeholder="Nom"
                                        name="nom">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" placeholder="Prenom"
                                        name="prenom">
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        name="email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="telephone">N° Téléphone</label>
                                    <input type="tel" id="telephone" class="form-control" name="telephone" />
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="form-label" for="ppr">PPR</label>
                                    <input type="text" id="ppr" class="form-control" name="ppr" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="etablissement">Etablissement</label>
                                    <select id="etablissement" class="form-control" name="etablissement">
                                        <option selected disabled>Etablissement...</option>
                                        @foreach ($etablissement as $etablissement)
                                            <option value="{{ $etablissement->etablissement }}">
                                                {{ $etablissement->etablissement }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="service">Service</label>
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
                            {{-- <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">
                                        Check me out
                                    </label>
                                </div>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Effectuer la demande</button>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

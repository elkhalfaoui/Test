@extends('layouts.servicemaster')
@section('title', 'Liste des stagiaires')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Liste des stagiaires</h1>
        <a href="{{ route('service.stagiaires.create') }}" class="btn btn-primary">Nouveau stagiaire</a>
    </div>
    <hr />
    @if ($errors->any())

        <div>
            <ul class="alert alert-d">
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
    @if (Session::has('warning'))
        <div class="alert alert-warning" role="alert">
            {{ Session::get('warning') }}
        </div>
    @endif
    <table class="table table-responsive table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Prénom</th>
                {{-- <th>Email</th>
                <th>Téléphone</th> --}}
                <th>Etablissement</th>
                <th>Service</th>
                <th>Type Stage</th>
                <th>Etablissement d'origine</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($stagiaires->count() > 0)
                @foreach ($stagiaires as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nom }}</td>
                        <td class="align-middle">{{ $rs->prenom }}</td>
                        {{-- <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->telephone }}</td> --}}
                        <td class="align-middle">{{ $rs->etablissement }}</td>
                        <td class="align-middle">{{ $rs->service }}</td>
                        <td class="align-middle">{{ $rs->type_stage }}</td>
                        <td class="align-middle">{{ $rs->etablissement_origine }}</td>
                        <td class="align-middle">{{ $rs->date_debut }}</td>
                        <td class="align-middle">{{ $rs->date_fin }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('service.stagiaires.absences', $rs->id) }}" type="button"
                                    class="btn btn-primary">Liste d'absences</a>
                                <a href="{{ route('service.stagiaires.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Détail</a>
                                <a href="{{ route('service.stagiaires.edit', $rs->id) }}" type="button"
                                    class="btn btn-warning">Modifier</a>
                                {{-- <a href="{{ route('stagiaires.valider', $rs->id) }}" type="button"
                                    class="btn btn-success">Valider</a>
                                <form action="{{ route('stagiaires.destroy', $rs->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0"
                                    onsubmit="return confirm('Voulez vous rééllement supprimer ce stagiaire ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Supprimer</button>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="10">Stagiaire Introuvable !</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

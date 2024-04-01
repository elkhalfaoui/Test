@extends('layouts.servicemaster')
@section('title', 'Liste des capacités du service')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Liste des capacités</h1>
        <a href="{{ route('service.capacite.create') }}" class="btn btn-primary">Nouvelle capacité</a>
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
                <th>Etablissement</th>
                <th>Service</th>
                <th>Filiere</th>
                <th>Niveau d'études</th>
                <th>Capacité 8h-12h (P1)</th>
                <th>Capacité 12h-16h (P2)</th>
                <th>Capacité 16h-20h (P3)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($capacites->count() > 0)
                @foreach ($capacites as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->etablissement }}</td>
                        <td class="align-middle">{{ $rs->service }}</td>
                        <td class="align-middle">{{ $rs->filiere }}</td>
                        <td class="align-middle">{{ $rs->niveau_etudes }}</td>
                        <td class="align-middle">{{ $rs->capaciteP1 }}</td>
                        <td class="align-middle">{{ $rs->capaciteP2 }}</td>
                        <td class="align-middle">{{ $rs->capaciteP3 }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('service.capacite.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Détail</a>
                                <a href="{{ route('service.capacite.edit', $rs->id) }}" type="button"
                                    class="btn btn-warning">Modifier</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="9">Capacité Introuvable !</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

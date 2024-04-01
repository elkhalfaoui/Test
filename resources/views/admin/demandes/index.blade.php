@extends('layouts.master')
@section('title', 'Liste des demandes de création de compte')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Liste des demandes</h1>
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
                <th>Email</th>
                <th>Téléphone</th>
                <th>Etablissement</th>
                <th>Service</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($demandes->count() > 0)
                @foreach ($demandes as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nom }}</td>
                        <td class="align-middle">{{ $rs->prenom }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->telephone }}</td>
                        <td class="align-middle">{{ $rs->etablissement }}</td>
                        <td class="align-middle">{{ $rs->service }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('admin.comptes.demandes.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Détails</a>
                                <a href="{{ route('admin.comptes.demandes.valider', $rs->id) }}" type="button"
                                    class="btn btn-success">Valider</a>
                                <form action="{{ route('admin.comptes.demandes.refuser', $rs->id) }}" method="POST"
                                    type="button" class="btn btn-danger p-0"
                                    onsubmit="return confirm('Voulez vous rééllement refuser cette demande ?')">
                                    @csrf
                                    @method('GET')
                                    <button class="btn btn-danger m-0">Refuser</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="8">Compte Introuvable !</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

@extends('layouts.master')
@section('title', 'Liste des écoles')
@section('content')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Liste des écoles</h1>
        <a href="{{ route('admin.ecoles.create') }}" class="btn btn-primary">Nouvelle école</a>
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
    <table class="table table-hover ">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Sigle</th>
                <th>Nom</th>
                {{-- <th>Email</th>
                <th>Téléphone</th> --}}
                <th>Email</th>
                <th>Téléphone</th>
                <th>Effectif accueil</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($ecoles->count() > 0)
                @foreach ($ecoles as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->sigle }}</td>
                        <td class="align-middle">{{ $rs->nom }}</td>
                        {{-- <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->telephone }}</td> --}}
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->telephone }}</td>
                        <td class="align-middle">{{ $rs->effectif_accueil }}</td>
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <a href="{{ route('admin.ecoles.absences', $rs->id) }}" type="button"
                                    class="btn btn-primary">Liste d'absences</a> --}}
                                <a href="{{ route('admin.ecoles.show', $rs->id) }}" type="button"
                                    class="btn btn-secondary">Détail</a>
                                <a href="{{ route('admin.ecoles.edit', $rs->id) }}" type="button"
                                    class="btn btn-warning">Modifier</a>
                                <form action="{{ route('admin.ecoles.destroy', $rs->id) }}" method="POST" type="button"
                                    class="btn btn-danger p-0"
                                    onsubmit="return confirm('Voulez vous rééllement supprimer cette école ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="7">Ecole Introuvable !</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection

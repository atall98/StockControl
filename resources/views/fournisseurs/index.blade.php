@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des fournisseurs</h1>
        <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary">Ajouter un fournisseur</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Matricule</th>
                    <th>Société</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{ $fournisseur->nom_fournisseur }}</td>
                        <td>{{ $fournisseur->matricule_fournisseur }}</td>
                        <td>{{ $fournisseur->societe }}</td>
                        <td>{{ $fournisseur->telephone }}</td>
                        <td>{{ $fournisseur->email }}</td>
                        <td>{{ $fournisseur->adresse }}</td>
                        <td>
                            <a href="{{ route('fournisseurs.show', $fournisseur->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('fournisseurs.edit', $fournisseur->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                            <form action="{{ route('fournisseurs.destroy', $fournisseur->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

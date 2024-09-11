@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-primary">Ajouter un client</a>

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
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->nom_client }}</td>
                        <td>{{ $client->matricule_client }}</td>
                        <td>{{ $client->societe }}</td>
                        <td>{{ $client->telephone }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->adresse }}</td>
                        <td>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">Éditer</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
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

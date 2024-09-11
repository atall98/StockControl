@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le client</h1>

        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom_client">Nom</label>
                <input type="text" name="nom_client" id="nom_client" class="form-control" value="{{ $client->nom_client }}" required>
            </div>
            <div class="form-group">
                <label for="matricule_client">Matricule</label>
                <input type="text" name="matricule_client" id="matricule_client" class="form-control" value="{{ $client->matricule_client }}" required>
            </div>
            <div class="form-group">
                <label for="societe">Société</label>
                <input type="text" name="societe" id="societe" class="form-control" value="{{ $client->societe }}" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $client->telephone }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $client->email }}" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $client->adresse }}">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection

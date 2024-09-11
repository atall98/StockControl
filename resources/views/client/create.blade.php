@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ajouter un client</h1>

        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nom_client">Nom</label>
                <input type="text" name="nom_client" id="nom_client" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="matricule_client">Matricule</label>
                <input type="text" name="matricule_client" id="matricule_client" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="societe">Société</label>
                <input type="text" name="societe" id="societe" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection

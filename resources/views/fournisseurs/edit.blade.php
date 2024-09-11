@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier le fournisseur</h1>

        <form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom_fournisseur">Nom</label>
                <input type="text" name="nom_fournisseur" id="nom_fournisseur" class="form-control" value="{{ $fournisseur->nom_fournisseur }}" required>
            </div>
            <div class="form-group">
                <label for="matricule_fournisseur">Matricule</label>
                <input type="text" name="matricule_fournisseur" id="matricule_fournisseur" class="form-control" value="{{ $fournisseur->matricule_fournisseur }}" required>
            </div>
            <div class="form-group">
                <label for="societe">Société</label>
                <input type="text" name="societe" id="societe" class="form-control" value="{{ $fournisseur->societe }}" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $fournisseur->telephone }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $fournisseur->email }}" required>
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $fournisseur->adresse }}">
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection

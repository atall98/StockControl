@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails du fournisseur</h1>

        <dl class="row">
            <dt class="col-sm-3">Nom</dt>
            <dd class="col-sm-9">{{ $fournisseur->nom_fournisseur }}</dd>

            <dt class="col-sm-3">Matricule</dt>
            <dd class="col-sm-9">{{ $fournisseur->matricule_fournisseur }}</dd>

            <dt class="col-sm-3">Société</dt>
            <dd class="col-sm-9">{{ $fournisseur->societe }}</dd>

            <dt class="col

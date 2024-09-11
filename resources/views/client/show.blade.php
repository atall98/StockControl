@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails du client</h1>

        <dl class="row">
            <dt class="col-sm-3">Nom</dt>
            <dd class="col-sm-9">{{ $client->nom_client }}</dd>

            <dt class="col-sm-3">Matricule</dt>
            <dd class="col-sm-9">{{ $client->matricule_client }}</dd>

            <dt class="col-sm-3">Société</dt>
            <dd class="col-sm-9">{{ $client->societe }}</dd>

            <dt class="col

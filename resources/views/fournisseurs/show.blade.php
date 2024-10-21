<!-- resources/views/fournisseurs/show.blade.php -->

@extends('layouts.app')

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    .container {
        background-color: rgb(8, 41, 255);
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
    }

    p {
        margin: 10px 0;
        line-height: 1.6;
        color: white;
    }

    strong {
        color: #333;
    }

    .back-button {
        display: inline-block;
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        text-align: center;
        font-size: 16px;
    }

    .back-button:hover {
        background-color: #0056b3;
    }
</style>

@section('content')
    <div class="container">
        <h1>Détails du fournisseur</h1>

        <p><strong>Nom:</strong> {{ $fournisseurs->nom_fournisseurs }}</p>
        <p><strong>Matricule:</strong> {{ $fournisseurs->matricule_fournisseurs }}</p>
        <p><strong>Société:</strong> {{ $fournisseurs->societe }}</p>
        <p><strong>Téléphone:</strong> {{ $fournisseurs->telephone }}</p>
        <p><strong>Email:</strong> {{ $fournisseurs->email }}</p>
        <p><strong>Adresse:</strong> {{ $fournisseurs->adresse }}</p>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mx-auto shadow-lg profile-card" style="max-width: 600px; margin-top: 50px;">
            <div class="card-header bg-primary text-white text-center rounded-top">
                <h2>Profil de l'utilisateur</h2>
            </div>
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    @if (auth()->user()->profile_image)
                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Photo de profil" class="img-thumbnail profile-image">
                    @else
                        <img src="https://via.placeholder.com/150" alt="Aucune photo" class="img-thumbnail profile-image">
                    @endif
                </div>

                <div class="mb-3">
                    <h4 class="info-title">Nom</h4>
                    <p class="info-text">{{ auth()->user()->name }}</p>
                </div>

                <div class="mb-3">
                    <h4 class="info-title">Email</h4>
                    <p class="info-text">{{ auth()->user()->email }}</p>
                </div>

                <div class="d-grid gap-2">
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning btn-block profile-button">Modifier le profil</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Styles globaux */
        body {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .profile-card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background-color: #007bff;
            border-bottom: 2px solid #0056b3;
        }

        .info-title {
            font-size: 1.25em;
            color: #007bff;
            margin-bottom: 0.5em;
            font-weight: bold;
        }

        .info-text {
            font-size: 1.1em;
            color: #555;
            margin: 0;
        }

        .profile-image {
            max-width: 150px;
            border-radius: 50%;
            border: 3px solid #007bff;
            transition: transform 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.05);
        }

        .profile-button {
            font-size: 1em;
            padding: 10px;
            transition: background 0.3s, transform 0.2s;
        }

        .profile-button:hover {
            background-color: #e68a00;
            transform: translateY(-2px);
        }

        @media (max-width: 576px) {
            .container {
                padding: 0 20px;
            }
        }
    </style>
@endsection

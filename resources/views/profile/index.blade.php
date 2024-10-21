@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mx-auto shadow-lg" style="max-width: 600px; margin-top: 50px;">
            <div class="card-header bg-primary text-white text-center">
                <h2>Profil de l'utilisateur</h2>
            </div>
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    @if (auth()->user()->profile_image)
                        <img src="{{ asset('storage/' . auth()->user()->profile_image) }}" alt="Photo de profil" class="img-thumbnail" style="max-width: 150px; border-radius: 50%;">
                    @else
                        <img src="https://via.placeholder.com/150" alt="Aucune photo" class="img-thumbnail" style="max-width: 150px; border-radius: 50%;">
                    @endif
                </div>

                <div class="mb-3">
                    <h4>Nom</h4>
                    <p>{{ auth()->user()->name }}</p>
                </div>

                <div class="mb-3">
                    <h4>Email</h4>
                    <p>{{ auth()->user()->email }}</p>
                </div>

                <div class="d-grid gap-2">
                    <!-- Lien vers la page d'édition du profil -->
                    <a href="{{ route('profile.edit') }}" class="btn btn-warning">Modifier le profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection

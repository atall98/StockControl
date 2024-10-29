@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow-lg profile-edit-card" style="max-width: 600px;">
            <div class="card-header bg-gradient-primary text-white text-center rounded-top">
                <h2 class="mb-0">Modifier le Profil</h2>
            </div>
            <div class="card-body p-5">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-4">
                        <label for="name" class="font-weight-bold">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="email" class="font-weight-bold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                    </div>

                    <div class="form-group mb-4">
                        <label for="profile_image" class="font-weight-bold">Photo de profil</label>
                        <input type="file" class="form-control-file" id="profile_image" name="profile_image">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block shadow-sm">Mettre à jour le profil</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd, #bbdefb);
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .profile-edit-card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 50px;
        }

        .profile-edit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }

        .card-header.bg-gradient-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            font-size: 1.5rem;
        }

        .form-group label {
            font-size: 1rem;
            color: #555;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 0.75rem;
            font-size: 1rem;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @media (max-width: 576px) {
            .card {
                padding: 20px;
            }
        }
    </style>
@endsection

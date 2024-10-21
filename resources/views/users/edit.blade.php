@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier Utilisateur</h1>
  
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="roles">Rôles</label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                           class="form-check-input" 
                           {{ $user->roles->contains($role->id) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $role->name }}</label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour l'utilisateur</button>
    </form>
</div>
@endsection

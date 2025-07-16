@extends('layouts.base')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Modifier l'utilisateur</h1>
    <div class="card mb-4">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $user->nom }}" >
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $user->prenom }}" >
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" >
                </div>

                <div class="form-group mb-3">
                    <label for="password">Nouveau mot de passe (laisser vide si inchangé)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="password_confirmation">Confirmer le mot de passe</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" id="telephone" name="telephone" value="{{ $user->telephone }}" >
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Rôle</label>
                    <select class="form-select" id="role" name="role">
                        @foreach($roles as $role)
                            <option value="{{ $role->name }}" {{ $user->role === $role->name ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Annuler</a>
            </form>
        </div>
    </div>
</div>
@endsection

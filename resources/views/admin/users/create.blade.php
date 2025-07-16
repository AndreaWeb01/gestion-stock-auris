@extends('layouts.base')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Modifier l'utilisateur</h1>
    <div class="card mb-4">
        <div class="card-body">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom"  >
                </div>

                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom"  >
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email"  >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Laisser vide pour garder le mot de passe actuel">
                </div>

                <div class="mb-3">
                    <label for="telephone" class="form-label">Numéro de téléphone</label>
                    <input type="tel" class="form-control" id="telephone" name="telephone">

                <button type="submit" class="btn btn-primary"> Creer</button>

            </form>
        </div>
    </div>
</div>
@endsection

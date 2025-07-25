@extends('layouts.base')
@section('content')
<div class="row mt-5">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-gradient bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-white m-0"><i class="fas fa-add me-2"></i>  Creation un nouvel utilisateur</h3>
                <a href="{{ route('users.index') }}" class="btn btn-light text-info fw-bold shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
            </div>
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
                </div>

                <button type="submit" class="btn btn-info btn-lg px-5"><i class="fas fa-save me-2"></i> Créer</button>

            </form>
        </div>
        </div>
    </div>
</div>
@endsection

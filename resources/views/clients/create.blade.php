@extends('layouts.base')
@section('title', 'Créer un client')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Créer un nouveau client</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="form-control @error('nom') is-invalid @enderror" required>
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" name="prenom" id="prenom" value="{{ old('prenom') }}" class="form-control @error('prenom') is-invalid @enderror">
                            @error('prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid @enderror" required>
                            @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" name="adresse" id="adresse" value="{{ old('adresse') }}" class="form-control @error('adresse') is-invalid @enderror">
                            @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success w-100">Créer Client</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

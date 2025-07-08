@extends('layouts.base')

@section('content')
<div class="container">
    <h4>Créer un mouvement de stock</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('mouvementStocks.store') }}">
        @csrf

        <div class="mb-3">
            <label>Produit</label>
            <select name="produit_id" class="form-control" required>
                <option value="">-- Choisir un produit --</option>
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}">{{ $produit->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Utilisateur</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Choisir un utilisateur --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nom }}</option>
                @endforeach
            </select>

        </div>

        <div class="mb-3">
            <label>Type de mouvement</label>
            <select name="type_mouvement" class="form-control" required>
                <option value="entree">Entrée</option>
                <option value="sortie">Sortie</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Quantité</label>
            <input type="number" name="quantite" class="form-control" required min="1">
        </div>

        <div class="mb-3">
            <label>Motif</label>
            <input type="text" name="motif" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Date du mouvement</label>
            <input type="date" name="date_mouvement" class="form-control" value="{{ date('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection

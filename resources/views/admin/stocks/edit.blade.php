@extends('layouts.base')

@section('content')
<div class="container">
    <h4>Modifier un mouvement de stock</h4>

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

    <form method="POST" action="{{ route('mouvementStocks.update', $mouvementStock->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Produit</label>
            <select name="produit_id" class="form-control" required>
                <option value="">-- Choisir un produit --</option>
                @foreach($produits as $produit)
                    <option value="{{ $produit->id }}" {{ $mouvementStock->produit_id == $produit->id ? 'selected' : '' }}>
                        {{ $produit->nom}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Utilisateur</label>
            <select name="user_id" class="form-control" required>
                <option value="">-- Choisir un utilisateur --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $mouvementStock->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Type de mouvement</label>
            <select name="type_mouvement" class="form-control" required>
                <option value="entree" {{ $mouvementStock->type_mouvement == 'entree' ? 'selected' : '' }}>Entrée</option>
                <option value="sortie" {{ $mouvementStock->type_mouvement == 'sortie' ? 'selected' : '' }}>Sortie</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Quantité</label>
            <input type="number" name="quantite" class="form-control" required min="1" value="{{ old('quantite', $mouvementStock->quantite) }}">
        </div>

        <div class="mb-3">
            <label>Motif</label>
            <input type="text" name="motif" class="form-control" required value="{{ old('motif', $mouvementStock->motif) }}">
        </div>

        <div class="mb-3">
            <label>Date du mouvement</label>
            <input type="date" name="date_mouvement" class="form-control" value="{{ old('date_mouvement', $mouvementStock->date_mouvement) }}" >
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection

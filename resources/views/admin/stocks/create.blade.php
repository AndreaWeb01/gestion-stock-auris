@extends('layouts.base')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-gradient bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-white m-0"><i class="fas fa-list me-2"></i>  Liste des mouvements de stock</h3>
                <a href="{{ route('mouvementStocks.create') }}" class="btn btn-light text-info fw-bold shadow-sm">
                    <i class="fas fa-plus me-1"></i> Nouveau mouvement de stock
                </a>
            </div>
             <div class="card-body">
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

        <div class="text-end">
            <button type="submit" class="btn btn-info btn-lg px-5">
                <i class="fas fa-save me-2"></i>Enregistrer le mouvement
            </button>
        </div>
    </form>
</div>
@endsection

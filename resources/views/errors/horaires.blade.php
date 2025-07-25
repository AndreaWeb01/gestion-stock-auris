@extends('layouts.base')

@section('title', 'Vente non autorisée')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg border-0 p-5 text-center animate__animated animate__fadeInDown" style="max-width: 600px; width: 100%;">
        <div class="mb-4 text-danger">
            <i class="bi bi-x-octagon-fill" style="font-size: 4rem;"></i>
        </div>
        <h2 class="text-danger mb-3">Vente bloquée</h2>
        <p class="lead">⛔ Les ventes ne sont pas autorisées à cette heure.</p>
        <p>Horaires autorisés pour <strong>{{ $jour }}</strong> :</p>
        <p><span class="badge bg-secondary">{{ $ouverture }} - {{ $fermeture }}</span></p>

        <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-4">
            <i class="bi bi-arrow-left-circle"></i> Retour
        </a>
    </div>
</div>
@endsection

@section('styles')
<!-- Animation CSS (facultatif) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection

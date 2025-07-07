@extends('layouts.base')

@section('content')

<div class="container-fluid">

    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Créer un produit</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="{{ route('produits.index') }}">Produits</a></li>
                        <li class="breadcrumb-item active">Créer</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Nouveau Produit</h4>
                    <p class="sub-header">Remplissez le formulaire pour ajouter un nouveau produit.</p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="needs-validation" novalidate method="POST" action="{{ route('produits.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du produit</label>
                            <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required maxlength="255">
                            <div class="invalid-feedback">
                                Veuillez saisir le nom du produit.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="number" step="0.01" min="0" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix" value="{{ old('prix') }}" required>
                            <div class="invalid-feedback">
                                Veuillez saisir un prix valide.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="seuil_alerte" class="form-label">Seuil d'alerte</label>
                            <input type="number" min="0" class="form-control @error('seuil_alerte') is-invalid @enderror" id="seuil_alerte" name="seuil_alerte" value="{{ old('seuil_alerte') }}" required>
                            <div class="invalid-feedback">
                                Veuillez saisir un seuil d'alerte valide.
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Créer le produit</button>
                    </form>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

</div>

    <a href="{{ route('produits.index') }}">Retour à la liste des produits</a>
    @endsection

</body>
</html>

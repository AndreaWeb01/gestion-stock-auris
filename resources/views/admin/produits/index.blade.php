@extends('layouts.base')

@section('title', 'Liste des produits')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">📦 Liste des produits</h4>
                <a href="{{ route('produits.create') }}" class="btn btn-light btn-sm">
                    ➕ Nouveau produit
                </a>
            </div>

            <div class="card-body">
                <p class="text-muted">
                    L'extension <strong>Buttons</strong> pour <strong>DataTables</strong> fournit un ensemble d'options et de méthodes API pour interagir avec un tableau de manière stylée et dynamique.
                </p>

                <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th>Nom</th>
                            <th>Quantité</th>
                            <th>Prix (CFA)</th>
                            <th>Seuil d'alerte</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produits as $produit)
                        <tr>
                            <td>{{ $produit->nom }}</td>

                            <td>
                                <span class="badge bg-{{ $produit->quantite <= $produit->seuil_alerte ? 'danger' : 'success' }}">
                                    {{ $produit->quantite }}
                                </span>
                            </td>

                            <td>{{ $produit->prix }} CFA</td>

                            <td>
                                <span class="badge bg-warning text-dark">{{ $produit->seuil_alerte }}</span>
                            </td>

                            <td>{{ \Carbon\Carbon::parse($produit->date)->format('d/m/Y') }}</td>

                            <td>
                                <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
                                    ✏️ Modifier
                                </a>

                                <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce produit ?')">
                                        🗑️ Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                 <div>
                        {{ $produits->links() }}
                    </div>

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

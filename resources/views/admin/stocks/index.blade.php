@extends('layouts.base')

@section('title', 'Liste des produits')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">📦 Liste des Mouvement de Stock</h4>
                <a href="{{ route('mouvementStocks.create') }}" class="btn btn-light btn-sm">
                    ➕ Nouveau Mouvement de Stock
                </a>
            </div>

            <div class="card-body">
                <p class="text-muted">
                    L'extension <strong>Buttons</strong> pour <strong>DataTables</strong> fournit un ensemble d'options et de méthodes API pour interagir avec un tableau de manière stylée et dynamique.
                </p>

                <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap w-100">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Produit</th>
                            <th>Utilisateur</th>
                            <th>Type de mouvement</th>
                            <th>Quantité</th>
                            <th>Stock après mouvement</th>
                            <th>Motif</th>
                            <th>Date du mouvement</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mouvements as $mouvement)
                        <tr>
                            <td>{{ $mouvement->id }}</td>
                            <td>{{ $mouvement->produit->nom }}</td>
                            <td>{{ $mouvement->user->nom }}</td>
                            <td>{{ $mouvement->type_mouvement }}</td>
                            <td>{{ $mouvement->quantite }}</td>
                            <td>{{ $mouvement->produit->stock_actuel }}</td>
                            <td>{{ $mouvement->motif }}</td>
                            <td>{{ \Carbon\Carbon::parse($mouvement->date_mouvement)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('mouvementStocks.edit', $mouvement->id) }}" class="btn btn-sm btn-warning">
                                    ✏️ Modifier
                                </a>

                                <form action="{{ route('mouvementStocks.destroy', $mouvement->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce mouvement ?')">
                                        🗑️ Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                 <div>
                        {{ $mouvements->links() }}
                    </div>

            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection



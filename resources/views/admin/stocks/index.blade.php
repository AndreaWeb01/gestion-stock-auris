@extends('layouts.base')

@section('title', 'Liste des produits')

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
                <div class="table-responsive">
                <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap w-100">
                    <thead class="table-dark">
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
                                    <a href="{{ route('mouvementStocks.edit', $mouvement->id) }}" class="btn btn-lg btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('mouvementStocks.destroy', $mouvement->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-lg btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                            <i class="fas fa-trash"></i>
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



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


                <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap w-100">
                    <thead class="table-dark">
                        <tr>
                            <th>Nom</th>
                            <th>Total Entrées</th>
                            <th>Total Sorties</th>
                            <th>Stock Actuel</th>
                            <th>Prix (CFA)</th>
                            <th>Seuil d'alerte</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($produits as $produit )

                        <tr @php $stock = $produit->stock_actuel; @endphp @if($stock < $produit->seuil_alerte) style="background-color: #f8d7da;" @endif>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->mouvements->where('type_mouvement', 'entree')->sum('quantite') }}</td>
                            <td>{{ $produit->mouvements->where('type_mouvement', 'sortie')->sum('quantite') }}</td>
                            <td>{{ $produit->stock_actuel }}</td>
                            <td>{{ $produit->prix }} CFA</td>
                            <td>
                                <span class="badge bg-warning text-dark">{{ $produit->seuil_alerte }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($produit->date)->format('d/m/Y') }}</td>
                            <td>
                                <a href="{{ route('produits.edit', $produit->id) }}" class="btn btn-sm btn-warning">
                                    ✏️ Modifier
                                </a>
                                <form id="delete-form-{{ $produit->id }}" action="{{ route('permissions.destroy', $produit) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" data-form-id="delete-form-{{ $produit->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produits->appends(request()->query())->links() }}
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection

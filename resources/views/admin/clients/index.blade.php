@extends('layouts.base')
@section('title', 'Liste des Clients')
@section('content')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-gradient bg-info  d-flex justify-content-between align-items-center">
                <h4 class=" text-white mb-0"> <i class="fas fa-list me-2"></i> Liste des clients</h4>
                <a href="{{ route('clients.create') }}" class="btn btn-light text-info fw-bold shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
            </div>

            <div class="card-body">
     @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-hover table-bordered dt-responsive nowrap w-100">
        <thead class="table-dark">
            <tr class="align-item-center">
                <th>Code Client</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Téléphone</th>
                <th>Adresse</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->code_client }}</td>
                    <td>{{ $client->nom }}</td>
                    <td>{{ $client->prenom }}</td>
                    <td>{{ $client->telephone }}</td>
                    <td>{{ $client->adresse }}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-info"><i class="fas fa-edit btn-delete"></i> </a>
                        <form id="delete-form-{{ $client->id }}" action="{{ route('clients.destroy', $client) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-lg btn-danger btn-delete" data-form-id="delete-form-{{ $client->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $clients->links() }} <!-- Pagination links -->
 </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>


@endsection

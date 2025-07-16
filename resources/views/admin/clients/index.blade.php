@extends('layouts.base')
@section('title', 'Liste des Clients')
@section('content')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header gb-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Liste des clients</h4>
                <a href="{{ route('clients.create') }}" class="btn btn-light btn-sm">
                    ➕ Nouveau client
                </a>
            </div>

            <div class="card-body">
     @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap w-100">
        <thead class="table-dark">
            <tr>
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
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning">Modifier</a>
                        <!-- Add delete functionality if needed -->
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

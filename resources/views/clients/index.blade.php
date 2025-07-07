@extends('layouts.base')
@section('title', 'Liste des Clients')
@section('content')
    <h1>Liste des Clients</h1>

    <a href="{{ route('clients.create') }}">Créer un nouveau client</a>

    <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap w-100">
        <thead>
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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection

@extends('layouts.base')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Liste des Utilisateurs</h3>
                    <div class="card-tools">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">Ajouter un Utilisateur</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Rôle</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->nom }}</td>
                                <td>{{ $user->prenom }}</td>
                                <td>
                                @forelse($user->getRoleNames() as $role)
                                    <span class="badge bg-primary">{{ $role }}</span>
                                @empty
                                    <span class="text-muted">Aucun rôle</span>
                                @endforelse
                            </td>

                                <td>{{ $user->email }}</td>
                                <td>{{ $user->telephone }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

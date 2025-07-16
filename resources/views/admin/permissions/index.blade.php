@extends('layouts.base')

@section('title', 'Gestion des Rôles')

@section('content')
<div class="container-fluid">
    @if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Liste des permissions </h3>
                    <div class="card-tools">
                        @can('create-permission')
                        <a href="{{ route('permissions.create') }}" class="btn btn-light">
                            <i class="fas fa-plus"></i> Nouvelle permission
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="delete-form-{{ $permission->id }}" action="{{ route('permissions.destroy', $permission) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger btn-delete" data-form-id="delete-form-{{ $permission->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>

                                            </form>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @if($permissions->isEmpty())
                    <div class="alert alert-info mt-3" role="alert">
                        Aucun rôle trouvé.
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




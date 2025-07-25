@extends('layouts.base')

@section('title', 'Gestion des Rôles')

@section('content')
<div class="container-fluid">
    @if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

    <div class="row my-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-gradient bg-info d-flex justify-content-between align-items-center">
                    <h3 class="header-title text-white"><i class="fas fa-list me-2"></i>Liste des permissions </h3>
                    <div class="card-tools">
                        @can('create-permission')
                        <a href="{{ route('permissions.create') }}" class="btn btn-light text-info fw-bold shadow-sm">
                            <i class="fas fa-plus me-1"></i> Nouvelle permission
                        </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap w-100">
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
                                        <div class="btn-group gap-2">
                                            <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-lg btn-info rounded-3">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form id="delete-form-{{ $permission->id }}" action="{{ route('permissions.destroy', $permission) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-lg btn-danger btn-delete rounded-3" data-form-id="delete-form-{{ $permission->id }}">
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




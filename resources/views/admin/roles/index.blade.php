@extends('layouts.base')

@section('title', 'Roles Management')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Gestion des rôles</h1>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-user-shield me-1"></i>
                Liste des rôles
            </div>

            @can('create-role')
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Nouveau rôle
                </a>
            @endcan
        </div>

        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="rolesTable">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Permissions</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="badge bg-info text-dark mb-1">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex gap-2 flex-wrap">

                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-sm" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>



                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>



                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce rôle ?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
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
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#rolesTable').DataTable({
                responsive: true,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.4/i18n/fr-FR.json"
                }
            });
        });
    </script>
@endpush

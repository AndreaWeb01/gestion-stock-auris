@extends('layouts.base')

@section('title', 'Roles Management')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-gradient bg-info d-flex justify-content-between align-items-center">
                <h3 class="text-white m-0"><i class="fas fa-list me-2"></i>  Liste des rôles</h3>
                <a href="{{ route('roles.create') }}" class="btn btn-light text-info fw-bold shadow-sm">
                    <i class="fas fa-plus me-1"></i> Nouveau rôle
                </a>
            </div>
        <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="rolesTable">
                    <thead class="table-dark">
                        <tr>
                            <th>N</th>
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
                                <div class="d-flex gap-2">

                                        <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info btn-lg rounded-3" title="Voir">
                                            <i class="fas fa-eye"></i>
                                        </a>



                                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-lg rounded-3" title="Modifier">
                                            <i class="fas fa-edit"></i>
                                        </a>



                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce rôle ?')" class="d-inline rounded-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-lg rounded-3" title="Supprimer">
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

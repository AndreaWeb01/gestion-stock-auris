@extends('layouts.base')

@section('title', 'Modifier un rôle')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Modifier le rôle</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('roles.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="form-label fw-bold">Nom du rôle</label>
                    <input type="text" name="name" class="form-control form-control-lg border-primary" value="{{ $role->name }}" required>
                </div>

                <div class="mb-4">
                    <label for="permissions" class="form-label fw-bold">Permissions</label>
                    <div class="row g-3">
                        @foreach($permissions as $permission)
                            <div class="col-md-4">
                                <div class="form-check custom-checkbox">
                                    <input class="form-check-input border-primary" type="checkbox"
                                           name="permissions[]"
                                           value="{{ $permission->name }}"
                                           id="perm-{{ $permission->id }}"
                                           {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                    <label class="form-check-label text-secondary" for="perm-{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                        <i class="fas fa-save me-2"></i>Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

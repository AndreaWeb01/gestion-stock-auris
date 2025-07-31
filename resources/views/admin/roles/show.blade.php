@extends('layouts.base')

@section('content')
<div class="row mt-5">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header card-heade d-flex justify-content-between align-items-center">
                <h3 class="text-white m-0"><i class="fas fa-eye me-2"></i> Détail du rôle</h3>
                <a href="{{ route('roles.index') }}" class="btn btn-header fw-bold shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
            </div>
            <div class="card-body">
                <h3 class="mb-3">Nom du rôle :</h3>
                <H4 class="fw-bold">{{ $role->name }}</H4>

                <h5 class="mb-3">Permissions associées :</h5>
                @if($role->permissions->count())
                    <ul class="list-group mb-3">
                        @foreach($role->permissions as $permission)
                            <li class="list-group-item">{{ $permission->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Aucune permission associée à ce rôle.</p>
                @endif

                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-header1 btn-sm me-2">
                    <i class="fas fa-edit me-1"></i> Modifier
                </a>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection

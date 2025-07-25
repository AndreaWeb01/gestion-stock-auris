@extends('layouts.base')

@section('title', 'Create Permission')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-gradient bg-info d-flex justify-content-between align-items-center">
                    <h3 class="header-title text-white"><i class="fas fa-plus me-2"></i>Nouveau Produit</h3>
                     <a href="{{ route('produits.index') }}" class="btn btn-light text-info fw-bold shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
                </div>
                <form action="{{ route('permissions.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Permission Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="guard_name">Guard Name</label>
                            <input type="text" name="guard_name" id="guard_name" class="form-control @error('guard_name') is-invalid @enderror" value="{{ old('guard_name', 'web') }}">
                            @error('guard_name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-save me-2"></i> Create Permission
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

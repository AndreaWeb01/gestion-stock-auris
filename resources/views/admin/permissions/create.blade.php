@extends('layouts.base')

@section('title', 'Create Permission')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-gradient bg-info d-flex justify-content-between align-items-center">
                    <h3 class="header-title text-white"><i class="fas fa-plus me-2"></i>Nouvelle Permission</h3>
                     <a href="{{ route('permissions.index') }}" class="btn btn-header text-info  shadow-sm">
                    <i class="fas fa-arrow-left me-1"></i> Retour
                </a>
                </div>
                <div class="card-body">

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



                    </div>

                        <button type="submit" class="btn btn-info btn-lg px-5">
                            <i class="fas fa-save me-2"></i> Create Permission

                    </div>
                </form>
            </div>
        </div>
    </div>
      </div>
    </div>


@endsection

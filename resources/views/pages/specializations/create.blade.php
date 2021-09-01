@extends('layouts.default')

@section('title','Specializations')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">Create Specialization</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('specializations.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-control-label">Name</label>
                        <input  type="text"
                                name="name" 
                                value="{{ old('name') }}" 
                                class="form-control @error('name') is-invalid @enderror"/>
                        @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="code" class="form-control-label">Code</label>
                        <input  type="text"
                                name="code" 
                                value="{{ old('code') }}" 
                                class="form-control @error('code') is-invalid @enderror"/>
                        @error('code') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-control-label">Image</label>
                        <input  type="text"
                                name="image" 
                                value="{{ old('image') }}" 
                                class="form-control @error('image') is-invalid @enderror"/>
                        @error('image') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="icon" class="form-control-label">Icon</label>
                        <input  type="text"
                                name="icon" 
                                value="{{ old('icon') }}" 
                                class="form-control @error('icon') is-invalid @enderror"/>
                        @error('icon') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="color" class="form-control-label">Color</label>
                        <input  type="text"
                                name="color" 
                                value="{{ old('color') }}" 
                                class="form-control @error('color') is-invalid @enderror"/>
                        @error('color') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add Specialization</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
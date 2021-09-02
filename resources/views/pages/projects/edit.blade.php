@extends('layouts.default')

@section('title','Roles')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="mt-4">
            <h3>Edit Role {{ $item->name }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('roles.update', $item->id) }}" method="POST">
                    @method('PUT')    
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-control-label">Name</label>
                        <input  type="text"
                                name="name" 
                                value="{{ old('name') ? old('name') : $item->name }}" 
                                class="form-control @error('name') is-invalid @enderror"/>
                        @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="code" class="form-control-label">Code</label>
                        <input  type="text"
                                name="code" 
                                value="{{ old('code') ? old('code') : $item->code }}" 
                                class="form-control @error('code') is-invalid @enderror"/>
                        @error('code') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-control-label">Image</label>
                        <input  type="text"
                                name="image" 
                                value="{{ old('image') ? old('image') : $item->image }}" 
                                class="form-control @error('image') is-invalid @enderror"/>
                        @error('image') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Edit Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
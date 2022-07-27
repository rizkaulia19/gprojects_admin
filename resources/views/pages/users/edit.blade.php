@extends('layouts.default')

@section('title','Users')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="mt-4">
            <h3>Edit User {{ $item->name }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('users.update', $item->id) }}" method="POST">
                    @method('PUT')    
                    @csrf
                    <div class="form-group mb-3">
                        <label for="code" class="form-control-label">Code</label>
                        <input  type="text"
                                name="code" 
                                value="{{ old('code') ? old('code') : $item->code }}" 
                                {{ $item->code ? 'readonly' : '' }}
                                class="form-control @error('code') is-invalid @enderror"/>
                        @error('code') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-control-label">Name</label>
                        <input  type="text"
                                name="name" 
                                value="{{ old('name') ? old('name') : $item->name }}" 
                                class="form-control @error('name') is-invalid @enderror"/>
                        @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-control-label">Image</label>
                        <input  type="text"
                                name="image" 
                                value="{{ old('image') ? old('image') : $item->image }}" 
                                class="form-control @error('image') is-invalid @enderror"/>
                        @error('image') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="gender" class="form-control-label col-md-2">Jenis Kelamin</label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                    type="radio" name="gender" id="Pria" value="Pria" {{ $item->gender == 'Pria' ? 'checked' : ''}}>
                                <label class="form-check-label" for="Pria">Pria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                    type="radio" name="gender" id="Wanita" value="Wanita" {{ $item->gender == 'Wanita' ? 'checked' : ''}}>
                                <label class="form-check-label" for="Wanita">Wanita</label>
                            </div>
                        </div>
                        @error('gender') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nik" class="form-control-label">NIK</label>
                        <input  type="number"
                                name="nik" 
                                value="{{ old('nik') ? old('nik') : $item->nik }}" 
                                {{ $item->nik ? 'readonly' : '' }}
                                class="form-control @error('nik') is-invalid @enderror"/>
                        @error('nik') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" class="form-control-label">Username</label>
                        <input  type="text"
                                name="username" 
                                value="{{ old('username') ? old('username') : $item->username }}" 
                                class="form-control @error('username') is-invalid @enderror"/>
                        @error('username') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-control-label">Email</label>
                        <input  type="text"
                                name="email" 
                                value="{{ old('email') ? old('email') : $item->email }}" 
                                class="form-control @error('email') is-invalid @enderror"/>
                        @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" class="form-control-label">No HP</label>
                        <input  type="number"
                                name="phone" 
                                value="{{ old('phone') ? old('phone') : $item->phone }}" 
                                class="form-control @error('phone') is-invalid @enderror"/>
                        @error('phone') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="address" class="form-control-label">Alamat</label>
                        <input  type="text"
                                name="address" 
                                value="{{ old('address') ? old('address') : $item->address }}" 
                                class="form-control @error('address') is-invalid @enderror"/>
                        @error('address') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bio" class="form-control-label">Bio</label>
                        <input  type="text"
                                name="bio" 
                                value="{{ old('bio') ? old('bio') : $item->bio }}" 
                                class="form-control @error('bio') is-invalid @enderror"/>
                        @error('bio') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <!-- <div class="form-group mb-3">
                        <label for="ratingAsGpro" class="form-control-label">Rating GPro</label>
                        <input  type="text"
                                name="ratingAsGpro" 
                                value="{{ old('ratingAsGpro') ? old('ratingAsGpro') : $item->ratingAsGpro }}" 
                                class="form-control @error('address') is-invalid @enderror"/>
                        @error('ratingAsGpro') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="ratingAsGClient" class="form-control-label">Rating GCLient</label>
                        <input  type="text"
                                name="ratingAsGClient" 
                                value="{{ old('ratingAsGClient') ? old('ratingAsGClient') : $item->ratingAsGClient }}" 
                                class="form-control @error('ratingAsGClient') is-invalid @enderror"/>
                        @error('ratingAsGClient') <div class="text-muted">{{ $message }}</div> @enderror
                    </div> -->
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Edit User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
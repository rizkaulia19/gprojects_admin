@extends('layouts.default')

@section('title','Users')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">Create User</h3>
        </div>
        <div class="card">
            <div class="card-body">
            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="code" class="form-control-label">Code</label>
                        <input  type="text"
                                name="code" 
                                value="{{ old('code') }}" 
                                class="form-control @error('code') is-invalid @enderror"/>
                        @error('code') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="roleId" class="form-control-label">Role</label>
                        <select name="roleId"
                        placeholder="Choose Role"
                                class="form-control @error('roleId') is-invalid @enderror">
                                <option selected>Choose role...</option>
                                @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('roleId') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="name" class="form-control-label">Nama</label>
                        <input  type="text"
                                name="name" 
                                value="{{ old('name') }}" 
                                class="form-control @error('name') is-invalid @enderror"/>
                        @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="image" class="form-control-label">Image</label>
                        <input  type="text"
                                name="image" 
                                value="{{ old('image') }}" 
                                class="form-control @error('image') is-invalid @enderror"/>
                        @error('image') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="gender" class="form-control-label col-md-2">Jenis Kelamin</label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                    type="radio" name="gender" id="Pria" value="Pria">
                                <label class="form-check-label" for="Pria">Pria</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                    type="radio" name="gender" id="Wanita" value="Wanita">
                                <label class="form-check-label" for="Wanita">Wanita</label>
                            </div>
                        </div>
                        @error('gender') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="nik" class="form-control-label">NIK</label>
                        <input  type="text"
                                name="nik" 
                                value="{{ old('nik') }}" 
                                class="form-control @error('nik') is-invalid @enderror"/>
                        @error('nik') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" class="form-control-label">Username</label>
                        <input  type="text"
                                name="username" 
                                value="{{ old('username') }}" 
                                class="form-control @error('username') is-invalid @enderror"/>
                        @error('username') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-control-label">Password</label>
                        <input  type="password"
                                name="password" 
                                value="{{ old('password') }}" 
                                class="form-control @error('password') is-invalid @enderror"/>
                        @error('password') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-control-label">Email</label>
                        <input  type="email"
                                name="email" 
                                value="{{ old('email') }}" 
                                class="form-control @error('email') is-invalid @enderror"/>
                        @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="phone" class="form-control-label">No HP</label>
                        <input  type="text"
                                name="phone" 
                                value="{{ old('phone') }}" 
                                class="form-control @error('phone') is-invalid @enderror"/>
                        @error('phone') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="address" class="form-control-label">Alamat</label>
                        <input  type="text"
                                name="address" 
                                value="{{ old('address') }}" 
                                class="form-control @error('address') is-invalid @enderror"/>
                        @error('address') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="bio" class="form-control-label">Bio</label>
                        <input  type="text"
                                name="bio" 
                                value="{{ old('bio') }}" 
                                class="form-control @error('bio') is-invalid @enderror"/>
                        @error('bio') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <!-- <div class="form-group mb-3">
                        <label for="ratingAsGpro" class="form-control-label">Rating GPro</label>
                        <input  type="text"
                                name="ratingAsGpro" 
                                value="{{ old('ratingAsGpro') }}" 
                                class="form-control @error('ratingAsGpro') is-invalid @enderror"/>
                        @error('ratingAsGpro') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="ratingAsGClient" class="form-control-label">Rating GCLient</label>
                        <input  type="text"
                                name="ratingAsGclient" 
                                value="{{ old('ratingAsGclient') }}" 
                                class="form-control @error('ratingAsGpro') is-invalid @enderror"/>
                        @error('ratingAsGClient') <div class="text-muted">{{ $message }}</div> @enderror
                    </div> -->
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
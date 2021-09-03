@extends('layouts.default')

@section('title','Activities')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">Create Activity</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('projects.store') }}" method="POST">
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
                        <label for="userId" class="form-control-label">User</label>
                        <select name="userId"
                                class="form-control @error('userId') is-invalid @enderror">
                            <option selected>Choose user</option>
                            @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        @error('userId') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-control-label">Description</label>
                        <textarea name="description" 
                                class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description')}}</textarea>
                        @error('description') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="type" class="form-control-label">Type</label>
                        <input  type="text"
                                name="type" 
                                value="{{ old('type') }}" 
                                class="form-control @error('type') is-invalid @enderror"/>
                        @error('type') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="isConfirmed" class="form-control-label col-md-2">Is Confirmed</label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('isConfirmed') is-invalid @enderror"
                                    type="radio" name="isConfirmed" id="Yes" value="1">
                                <label class="form-check-label" for="Yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('isConfirmed') is-invalid @enderror"
                                    type="radio" name="isConfirmed" id="No" value="">
                                <label class="form-check-label" for="No">No</label>
                            </div>
                        </div>
                        @error('isConfirmed') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add Activity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
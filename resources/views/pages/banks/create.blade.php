@extends('layouts.default')

@section('title','Banks')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">Create Bank</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('banks.store') }}" method="POST">
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
                    <div class="form-group mb-3 row">
                        <label for="isAvailable" class="form-control-label col-md-2">Is Available</label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('isAvailable') is-invalid @enderror"
                                    type="radio" name="isAvailable" id="Yes" value="1">
                                <label class="form-check-label" for="Yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('isAvailable') is-invalid @enderror"
                                    type="radio" name="isAvailable" id="No" value="0">
                                <label class="form-check-label" for="No">No</label>
                            </div>
                        </div>
                        @error('isAvailable') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="canDisburse" class="form-control-label col-md-2">Can Disburse</label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('canDisburse') is-invalid @enderror"
                                    type="radio" name="canDisburse" id="Yes" value="1">
                                <label class="form-check-label" for="Yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('canDisburse') is-invalid @enderror"
                                    type="radio" name="canDisburse" id="No" value="0">
                                <label class="form-check-label" for="No">No</label>
                            </div>
                        </div>
                        @error('canDisburse') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3 row">
                        <label for="canNameValidate" class="form-control-label col-md-2">Can Name Validate</label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('canNameValidate') is-invalid @enderror"
                                    type="radio" name="canNameValidate" id="Yes" value="1">
                                <label class="form-check-label" for="Yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('canNameValidate') is-invalid @enderror"
                                    type="radio" name="canNameValidate" id="No" value="0">
                                <label class="form-check-label" for="No">No</label>
                            </div>
                        </div>
                        @error('canNameValidate') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add Bank</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
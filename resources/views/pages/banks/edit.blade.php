@extends('layouts.default')

@section('title','Banks')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="mt-4">
            <h3>Edit {{ $item->name }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('banks.update', $item->id) }}" method="POST">
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
                    <div class="form-group mb-3 row">
                        <label for="isAvailable" class="form-control-label col-md-2">Is Available</label>
                        <div class="col-md-10">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('isAvailable') is-invalid @enderror"
                                    type="radio" name="isAvailable" id="Yes" value="1" {{ $item->isAvailable == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="Yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('isAvailable') is-invalid @enderror"
                                    type="radio" name="isAvailable" id="No" value="0" {{ $item->isAvailable == '0' ? 'checked' : ''}}>
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
                                    type="radio" name="canDisburse" id="Yes" value="1" {{ $item->canDisburse == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="Yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('canDisburse') is-invalid @enderror"
                                    type="radio" name="canDisburse" id="No" value="0" {{ $item->canDisburse == '0' ? 'checked' : ''}}>
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
                                    type="radio" name="canNameValidate" id="Yes" value="1" {{ $item->canNameValidate == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="Yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('canNameValidate') is-invalid @enderror"
                                    type="radio" name="canNameValidate" id="No" value="0" {{ $item->canNameValidate == '0' ? 'checked' : ''}}>
                                <label class="form-check-label" for="No">No</label>
                            </div>
                        </div>
                        @error('canNameValidate') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Edit Bank</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
@extends('layouts.default')

@section('title','Advertises')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">Create Advertise</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('advertises.store') }}" method="POST">
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
                        <label for="advertiseTypeId" class="form-control-label">Advertise Type</label>
                        <select name="advertiseTypeId"
                                class="form-control @error('advertiseTypeId') is-invalid @enderror">
                            <option selected>Choose type</option>
                            @foreach ($advertise_types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('advertiseTypeId') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="currencyId" class="form-control-label">Currency</label>
                        <select name="currencyId"
                                class="form-control @error('currencyId') is-invalid @enderror">
                                <option selected>Choose currency</option>
                                @foreach ($currencies as $currency)
                            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                            @endforeach
                        </select>
                        @error('currencyId') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-control-label">Description</label>
                        <textarea name="description" 
                                class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description')}}</textarea>
                        @error('description') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="price" class="form-control-label">Price</label>
                        <input  type="number"
                                name="price" 
                                value="{{ old('price') }}" 
                                class="form-control @error('price') is-invalid @enderror"/>
                        @error('price') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add Advertise</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
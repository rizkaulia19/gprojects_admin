@extends('layouts.default')

@section('title','Advertises')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="mt-4">
            <h3>Edit {{ $item->name }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('advertises.update', $item->id) }}" method="POST">
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
                        <label for="advertiseTypeId" class="form-control-label">Advertise Type</label>
                        <select name="advertiseTypeId"
                                class="form-control @error('advertiseTypeId') is-invalid @enderror">
                            @foreach ($advertise_types as $type)
                            <option value="{{ $type->id }}" {{ $type->id == $item->advertiseTypeId ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('advertiseTypeId') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="currencyId" class="form-control-label">Currency</label>
                        <select name="currencyId"
                                class="form-control @error('currencyId') is-invalid @enderror"
                                disabled>
                            @foreach ($currencies as $currency)
                            <option value="{{ $currency->id }}" {{ $currency->id == $item->currencyId ? 'selected' : '' }}>
                                {{ $currency->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('currencyId') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description" class="form-control-label">Description</label>
                        <textarea name="description" 
                                class="ckeditor form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $item->description }}</textarea>
                        @error('description') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="price" class="form-control-label">Price</label>
                        <input  type="number"
                                name="price" 
                                value="{{ old('price') ? old('price') : $item->price }}" 
                                class="form-control @error('price') is-invalid @enderror"/>
                        @error('price') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Edit Advertise Type</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
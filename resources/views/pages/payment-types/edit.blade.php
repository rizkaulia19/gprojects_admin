@extends('layouts.default')

@section('title','Payment Gateway Channels')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="mt-4">
            <h3>Edit {{ $item->name }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('payment-types.update', $item->id) }}" method="POST">
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
                        <label for="paymentGatewayId" class="form-control-label">Payment Gateway</label>
                        <select name="paymentGatewayId"
                                class="form-control @error('paymentGatewayId') is-invalid @enderror">
                            @foreach ($payment_gateways as $pg)
                            <option value="{{ $pg->id }}" {{ $pg->id == $item->paymentGatewayId ? 'selected' : '' }}>
                                {{ $pg->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('paymentGatewayId') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="paymentTypeCategoryId" class="form-control-label">Payment Type Category</label>
                        <select name="paymentTypeCategoryId"
                                class="form-control @error('paymentTypeCategoryId') is-invalid @enderror">
                            @foreach ($payment_type_categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $item->paymentTypeCategoryId ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('paymentTypeCategoryId') <div class="text-muted">{{ $message }}</div> @enderror
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
                    <div class="form-group mb-3">
                        <label for="fixedFee" class="form-control-label">Fixed Fee</label>
                        <input  type="number"
                                name="fixedFee" 
                                value="{{ old('fixedFee') ? old('fixedFee') : $item->fixedFee }}" 
                                class="form-control @error('fixedFee') is-invalid @enderror"/>
                        @error('fixedFee') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="percentageFee" class="form-control-label">Percentage Fee</label>
                        <input  type="number"
                                step="any"
                                name="percentageFee" 
                                value="{{ old('percentageFee') ? old('percentageFee') : $item->percentageFee }}" 
                                class="form-control @error('percentageFee') is-invalid @enderror"/>
                        @error('percentageFee') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Edit Payment Gateway Channel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
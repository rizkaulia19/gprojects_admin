@extends('layouts.default')

@section('title','Payment Gateway Channels')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">Create Payment Gateway Channel</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('payment-types.store') }}" method="POST">
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
                        <label for="paymentGatewayId" class="form-control-label">Payment Gateway</label>
                        <select name="paymentGatewayId"
                                class="form-control @error('paymentGatewayId') is-invalid @enderror">
                            @foreach ($payment_gateways as $pg)
                            <option value="{{ $pg->id }}">{{ $pg->name }}</option>
                            @endforeach
                        </select>
                        @error('paymentGatewayId') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="paymentTypeCategoryId" class="form-control-label">Payment Type Category</label>
                        <select name="paymentTypeCategoryId"
                                class="form-control @error('paymentTypeCategoryId') is-invalid @enderror">
                            @foreach ($payment_type_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('paymentTypeCategoryId') <div class="text-muted">{{ $message }}</div> @enderror
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
                    <div class="form-group mb-3">
                        <label for="fixedFee" class="form-control-label">Fixed Fee</label>
                        <input  type="number"
                                name="fixedFee" 
                                value="{{ old('fixedFee') }}" 
                                class="form-control @error('fixedFee') is-invalid @enderror"/>
                        @error('fixedFee') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="percentageFee" class="form-control-label">Percentage Fee</label>
                        <input  type="number"
                                step="any"
                                name="percentageFee" 
                                value="{{ old('percentageFee') }}" 
                                class="form-control @error('percentageFee') is-invalid @enderror"/>
                        @error('percentageFee') <div class="text-muted">{{ $message }}</div> @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Add Payment Gateway Channel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
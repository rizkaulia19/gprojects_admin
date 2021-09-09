@extends('layouts.default')

@section('title','Payment Gateway Channels')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">{{ $item->name }}</h3>
        </div>
        <div class="card">
            <div class="card-body row">
                <div class="col-10">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <td>{{ $item->id }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $item->name }}</td>
                        </tr>
                        <tr>
                            <th>Code</th>
                            <td>{{ $item->code }}</td>
                        </tr>
                        <tr>
                            <th>Payment Gateway</th>
                            <td>{{ $item->payment_gateway->name }}</td>
                        </tr>
                        <tr>
                            <th>Payment Type Category</th>
                            <td>{{ $item->payment_type_category->name }}</td>
                        </tr>
                        <tr>
                            <th>Is Available</th>
                            <td>{{ $item->isAvailable ? 'Yes' : 'No' }}</td>
                        </tr>
                        <tr>
                            <th>Fixed Fee</th>
                            <td>{{ $item->fixedFee }}</td>
                        </tr>
                        <tr>
                            <th>Percentage Fee</th>
                            <td>{{ $item->percentageFee }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('payment-types.edit', $item->id) }}" class="btn btn-primary btn-sm">
                        Edit
                    </a>
                    <form action="{{ route('payment-types.destroy', $item->id) }}" method="post"
                        class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm"  onclick="return confirm('Delete &quot;{{ $item->name }}&quot;?')">
                            Delete
                        </button>
                    </form>
                </div>
                <div class="col-2">
                    @if ($item->image==null)
                    @else
                    <img src="{{ $item->image }}?key=GPROJECTS_54376A57AC5843349DBE6A57E9EE7B0F" class="img-thumbnail" alt="{{ $item->name }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
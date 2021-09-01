@extends('layouts.default')

@section('title','Banks')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">{{ $item->name }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
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
                        <th>Is Available</th>
                        <td>{{ $item->isAvailable ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th>Can Disburse</th>
                        <td>{{ $item->canDisburse ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th>Can Name Validate</th>
                        <td>{{ $item->canNameValidate ? 'Yes' : 'No' }}</td>
                    </tr>
                </table>
                <a href="{{ route('banks.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    Edit
                </a>
                <form action="{{ route('banks.destroy', $item->id) }}" method="post"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm"  onclick="return confirm('Delete &quot;{{ $item->name }}&quot;?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
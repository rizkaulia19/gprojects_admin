@extends('layouts.default')

@section('title','Banks')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="mt-4">Banks</h1>
            <a href="{{ route('banks.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Create Bank
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>IsAvailable</th>
                            <th>CanDisburse</th>
                            <th>CanNameValidate</th>
                            <th width="12%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>IsAvailable</th>
                            <th>CanDisburse</th>
                            <th>CanNameValidate</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->isAvailable ? 'Yes' : 'No' }}</td>
                                <td>{{ $item->canDisburse ? 'Yes' : 'No' }}</td>
                                <td>{{ $item->canNameValidate ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('banks.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('banks.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('banks.destroy', $item->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm"  onclick="return confirm('Delete &quot;{{ $item->name }}&quot;?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No entries found</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
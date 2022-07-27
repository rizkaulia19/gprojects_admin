@extends('layouts.default')

@section('title','User')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="mt-4">User</h1>
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Create User
            </a>
        </div>
        <div class="card">
            <div class="card-body">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>User created successfully!</strong> Check for the details below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif ($message = Session::get('updated'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>User updated successfully!</strong> Check for the details below.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->role->name }}</td>
                                <td>
                                    <a href="{{ route('users.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', $item->id) }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm"  onclick="return confirm('Delete &quot;{{ $item->name }}&quot;?')">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">No entries found</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
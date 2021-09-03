@extends('layouts.default')

@section('title','Projects')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="mt-4">Projects</h1>
            <!-- <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Create Role
            </a> -->
        </div>
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>GClient</th>
                            <th>GPro</th>
                            <th>Status</th>
                            <!-- <th>Update</th> -->
                            <th width="12%">Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>GClient</th>
                            <th>GPro</th>
                            <th>Status</th>
                            <!-- <th>Update</th> -->
                            <th width="12%">Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->cost }}</td>
                                <td>{{ $item->user->name}}</td>
                                @if ($item->project_applicants->count())
                                <td>{{ $item->project_applicants->first()->user->name }}</td>
                                <td>{{ $item->project_applicants->first()->status }}</td>
                                
                                @else
                                <td></td>
                                <td></td>
                                
                                @endif
                                <td>
                                    <a href="{{ route('projects.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('projects.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('projects.destroy', $item->id) }}" method="post"
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
                                <td colspan="8" class="text-center">No entries found</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
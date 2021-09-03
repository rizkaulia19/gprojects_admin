@extends('layouts.default')

@section('title','Projects')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">Project {{ $item->name }}</h3>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                    </tr>
                    <tr>
                        <th>Code</th>
                        <td>{{ $item->code }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <th>Is Available</th>
                        <td>{{ $item->isAvailable ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $item->address }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td class="long-text">{!! htmlspecialchars_decode(stripslashes($item->description)) !!}</td>
                    </tr>
                    <tr>
                        <th>Cost</th>
                        <td>{{ $item->cost }}</td>
                    </tr>
                </table>
                <a href="{{ route('roles.edit', $item->id) }}" class="btn btn-primary btn-sm">
                    Edit
                </a>
                <form action="{{ route('roles.destroy', $item->id) }}" method="post"
                    class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm"  onclick="return confirm('Delete &quot;{{ $item->name }}&quot;?')">
                        Delete
                    </button>
                </form>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                Activities
            </div>
            <div class="card-body">
                <a href="{{ route('projects.create') }}" class="btn btn-sm btn-primary shadow-sm mb-3">
                    <i class="fas fa-plus text-white-50"></i> Create Activity
                </a>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>User</th>
                            <th>Confirmed</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>User</th>
                            <th>Confirmed</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse ($item->project_activities as $activity)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $activity->name }}</td>
                                <td>{{ $activity->description }}</td>
                                <td>
                                    <?php 
                                    $type = str_replace("_"," ", $activity->type);
                                    $type = ucwords($type);
                                    ?>
                                    {{ $type }}
                                </td>
                                <td>{{ $activity->user->name }}</td>
                                <td>{{ $activity->isConfirmed ? 'Yes' : 'No' }}</td>
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
@extends('layouts.default')

@section('title','Specializations')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="mt-4">Specializations</h1>
            <a href="{{ route('specializations.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus text-white-50"></i> Create Specialization
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Count in Project</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Color</th>
                            <th>Count in Project</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse ($items as $item)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="row ms-0 me-0">{{ $item->color }}&nbsp;<div class="img-thumbnail mt-1" style="width:5px; height:17px; background-color:{{ $item->color }}"></div></td>
                                <td>{{ $item->project_specializations->count() }}</td>
                                <td>
                                    <a href="{{ route('specializations.show', $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('specializations.edit', $item->id) }}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('specializations.destroy', $item->id) }}" method="post"
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
                                <td colspan="5" class="text-center">No entries found</td>
                            </tr>
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
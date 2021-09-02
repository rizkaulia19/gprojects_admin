@extends('layouts.default')

@section('title','User')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">User {{ $item->code }}</h3>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{ $item->id }}</td>
                        <td><img src="{{ $item->profilePhoto }}" class="img-thumbnail w-25" alt="{{ $item->name }}"></td>
                    </tr>
                    <tr>
                        <th>Code</th>
                        <td>{{ $item->code }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $item->name }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{ $item->gender }}</td>
                    </tr>
                    <tr>
                        <th>NIK</th>
                        <td>{{ $item->nik }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $item->username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $item->email }}</td>
                    </tr>
                    <tr>
                        <th>No HP</th>
                        <td>{{ $item->phone }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $item->address }}</td>
                    </tr>
                    <tr>
                        <th>Bio</th>
                        <td>{{ $item->bio }}</td>
                    </tr>
                    <tr>
                        <th>Rating GPro</th>
                        <td>{{ $item->ratingAsGpro }}</td>
                    </tr>
                    <tr>
                        <th>Rating GClient</th>
                        <td>{{ $item->ratingAsGClient}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
@extends('layouts.default')

@section('title','User')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h3 class="mt-4">User {{ $item->code }}</h3>
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
                        <tr>
                            <th>Specialization</th>
                            <td>
                                @foreach ($item->user_specializations as $specialization)
                                    @if ($specialization == null || $specialization->specializationId == null)
                                        
                                    @else
                                        @if ($specialization->isMain==true)
                                            {{ $specialization->specialization->name }} (main)
                                        @else
                                            {{ $specialization->specialization->name }}
                                        @endif
                                    @endif
                                    @if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-2">
                    @if ($item->profilePhoto==null)
                    <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png" class="img-thumbnail" alt="{{ $item->name }}">
                    @else
                    <img src="{{ $item->profilePhoto }}?key=GPROJECTS_54376A57AC5843349DBE6A57E9EE7B0F" class="img-thumbnail" alt="{{ $item->name }}">
                    @endif
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@extends('layouts.default')

@section('title','SPK Spesialisasi')

@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="mt-4">SPK Spesialisasi</h1>
            <a href="" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-sync text-white-50"></i> Muat ranking baru
            </a>
        </div>
        <p class="mb-4">Daftar ranking spesialisasi berdasarkan spesialisasi yang kurang diminati</p>
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
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</main>


@endsection


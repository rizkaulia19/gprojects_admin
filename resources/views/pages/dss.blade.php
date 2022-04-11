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
                            <th>Spesialisasi</th>
                            <th>Jml Aplikan</th>
                            <th>Nominal Proyek</th>
                            <th>Total User</th>
                            <th>Total Proyek</th>
                            <th>Total Proyek Berhasil</th>
                            <th>Total Klik</th>
                            <th>Total Score</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Spesialisasi</th>
                            <th>Jml Aplikan</th>
                            <th>Nominal Proyek</th>
                            <th>Total User</th>
                            <th>Total Proyek</th>
                            <th>Total Proyek Berhasil</th>
                            <th>Total Klik</th>
                            <th>Total Score</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 0; ?>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['total_applicant'] }}</td>
                            <td>{{ number_format($item['revenue'], 0, '', ',') }}</td>
                            <td>{{ $item['total_user'] }}</td>
                            <td>{{ $item['total_project'] }}</td>
                            <td>{{ $item['succeed_project'] }}</td>
                            <td>{{ $item['total_click'] }}</td>
                            <td>{{ $item['score'] }}</td>
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
@extends('layouts.default')

@section('title','Dashboard')

@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4 mb-4">Your progress today</h2>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body"><h2>{{$count_total_user}}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            Total User (GPro & GCLient)  
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body"><h2>-</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Transaksi
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-success text-white mb-4">
                    <div class="card-body"><h2>-</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Amount Transaksi
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body"><h2>{{$count_total_proyek}}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            Total Proyek 
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body"><h2>{{$count_total_proyek_aktif}}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Proyek Aktif
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="card bg-info text-white mb-4">
                    <div class="card-body"><h2>{{$count_total_proyek_cancel}}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Proyek Cancel
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid px-2">
                        <div class="row">
                        <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Keahlian yang dibutuhkan
                                    </div>
                                    <div class="card-body"><canvas id="pie_chart_keahlian_butuh" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Keahlian tersedia
                                    </div>
                                    <div class="card-body"><canvas id="pie_chart_keahlian_tersedia" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-area me-1"></i>
                                Total User yang mendaftar
                            </div>
                            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Kota terbanyak sebagai titik coin
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-pie me-1"></i>
                                        Perbandingan User
                                    </div>
                                    <div class="card-body"><canvas id="pie_chart_user" width="100%" height="50"></canvas></div>
                                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
    </div>
</main>


@endsection

@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

<script>
       // Pie Chart Perbandingan User
        var ctx = document.getElementById("pie_chart_user");
        var pie_chart_user = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Gpro", "Gclient"],
                datasets: [{
                data: [{{$count_user_gpro}}, {{$count_user_gclient}}],
                backgroundColor: ['#ffc107', '#28a745'],
                }],
            },
        });

        // Pie Chart Keahlian dibutuhkan
        var ctx = document.getElementById("pie_chart_keahlian_butuh");
        var pie_chart_keahlian_butuh = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Gpro", "Gclient"],
                datasets: [{
                data: [{{$count_user_gpro}}, {{$count_user_gclient}}],
                backgroundColor: ['#007bff', '#dc3545'],
                }],
            },
        });

        // Pie Chart Keahlian tersedia
        var ctx = document.getElementById("pie_chart_keahlian_tersedia");
        var pie_chart_keahlian_tersedia = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Gpro", "Gclient"],
                datasets: [{
                data: [{{$count_user_gpro}}, {{$count_user_gclient}}],
                backgroundColor: ['#ffa500', '#800080'],
                }],
            },
        });
</script>
@endpush
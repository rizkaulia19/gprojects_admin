@extends('layouts.default')

@section('title','Dashboard')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4 mb-4">Your progress today</h2>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h2>{{$count_total_user}}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total User (GPro & GCLient)
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h2>-</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Transaksi

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h2>-</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Amount Transaksi
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <h2>{{$count_total_proyek}}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Proyek
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h2>{{$count_total_proyek_aktif}}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Proyek Aktif

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h2>{{$count_total_proyek_cancel}}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Proyek Cancel
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Keahlian yang dibutuhkan
                    </div>
                    <div class="card-body"><canvas id="pie_chart_keahlian_butuh" width="100%" height="50"></canvas>
                    </div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Keahlian tersedia
                    </div>
                    <div class="card-body"><canvas id="pie_chart_keahlian_tersedia" width="100%"
                            height="50"></canvas></div>
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
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area me-1"></i>
                Total Transaksi
            </div>
            <div class="card-body"><canvas id="transactionAmountChart" width="100%" height="30"></canvas></div>
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
        labels: [
            '{{$specialization_project[0]->name}}',
            '{{$specialization_project[1]->name}}',
            '{{$specialization_project[2]->name}}',
            '{{$specialization_project[3]->name}}',
            '{{$specialization_project[4]->name}}',
            '{{$specialization_project[5]->name}}',
            '{{$specialization_project[6]->name}}',
            '{{$specialization_project[7]->name}}',
            '{{$specialization_project[8]->name}}',
            '{{$specialization_project[9]->name}}',
        ],
        datasets: [{
            data: [
                {{$specialization_project[0]->project_specializations_count}},
                {{$specialization_project[1]->project_specializations_count}},
                {{$specialization_project[2]->project_specializations_count}},
                {{$specialization_project[3]->project_specializations_count}},
                {{$specialization_project[4]->project_specializations_count}},
                {{$specialization_project[5]->project_specializations_count}},
                {{$specialization_project[6]->project_specializations_count}},
                {{$specialization_project[7]->project_specializations_count}},
                {{$specialization_project[8]->project_specializations_count}},
                {{$specialization_project[9]->project_specializations_count}},
            ],
            backgroundColor: ['#0404fc','#ff5722','#60BD68','#F17CB0','#4D4D4D','#5DA5DA','#B2912F','#9c27b0','#fcf404','#F15854'],
        }],
    },
});

// Pie Chart Keahlian tersedia
var ctx = document.getElementById("pie_chart_keahlian_tersedia");
var pie_chart_keahlian_tersedia = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            '{{$specialization_user[0]->name}}',
            '{{$specialization_user[1]->name}}',
            '{{$specialization_user[2]->name}}',
            '{{$specialization_user[3]->name}}',
            '{{$specialization_user[4]->name}}',
            '{{$specialization_user[5]->name}}',
            '{{$specialization_user[6]->name}}',
            '{{$specialization_user[7]->name}}',
            '{{$specialization_user[8]->name}}',
            '{{$specialization_user[9]->name}}',
        ],
        datasets: [{
            data: [
                {{$specialization_user[0]->user_specializations_count}},
                {{$specialization_user[1]->user_specializations_count}},
                {{$specialization_user[2]->user_specializations_count}},
                {{$specialization_user[3]->user_specializations_count}},
                {{$specialization_user[4]->user_specializations_count}},
                {{$specialization_user[5]->user_specializations_count}},
                {{$specialization_user[6]->user_specializations_count}},
                {{$specialization_user[7]->user_specializations_count}},
                {{$specialization_user[8]->user_specializations_count}},
                {{$specialization_user[9]->user_specializations_count}},
            ],
            backgroundColor: ['#0404fc','#ff5722','#60BD68','#F17CB0','#4D4D4D','#5DA5DA','#B2912F','#9c27b0','#fcf404','#F15854'],
        }],
    },
});

//Chart area Total user mendaftar
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Mar 10", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7", "Mar 8", "Mar 9", "Mar 10", "Mar 11", "Mar 12", "Mar 13"],
        datasets: [{
            label: "Sessions",
            lineTension: 0.3,
            backgroundColor: "rgba(2,117,216,0.2)",
            borderColor: "rgba(2,117,216,1)",
            pointRadius: 5,
            pointBackgroundColor: "rgba(2,117,216,1)",
            pointBorderColor: "rgba(255,255,255,0.8)",
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(2,117,216,1)",
            pointHitRadius: 50,
            pointBorderWidth: 2,
            data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                time: {
                    unit: 'date'
                },
                gridLines: {
                    display: false
                },
                ticks: {
                    maxTicksLimit: 7
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    max: 40000,
                    maxTicksLimit: 5
                },
                gridLines: {
                    color: "rgba(0, 0, 0, .125)",
                }
            }],
        },
        legend: {
            display: false
        }
    }
});

//Chart line total transaksi
var ctx = document.getElementById("transactionAmountChart");
var transactionAmountChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Mar 10", "Mar 2", "Mar 3", "Mar 4", "Mar 5", "Mar 6", "Mar 7"],
        datasets: [{
            label: 'My First Dataset',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0
        }],
    }
});
</script>
@endpush
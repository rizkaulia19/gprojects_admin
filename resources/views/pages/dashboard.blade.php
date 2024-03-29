@extends('layouts.default')

@section('title','Dashboard')

@section('content')
<main>
    <div class="container-fluid px-4">
        <h2 class="mt-4 mb-4">Your progress today</h2>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h2>{{$count_total_proyek}}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        Total Proyek
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h2>{{$count_total_proyek_aktif}}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                    Total Proyek&nbsp;<b>Aktif</b> 
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h2>{{$count_total_proyek_sukses}}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        Total Proyek&nbsp;<b>Sukses</b>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h2>{{$count_total_proyek_cancel}}</h2>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        Total Proyek&nbsp;<b>Cancel</b>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Kota terbanyak sebagai titik coin
                    </div>
                    <div class="card-body"><canvas id="countCityChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Titik koin terbanyak : {{$count_city[0]->city}}</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie me-1"></i>
                        Perbandingan User
                    </div>
                    <div class="card-body"><canvas id="pie_chart_user" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Total User :&nbsp;<b>{{$count_total_user}}</b></div>
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
                    <div class="card-body"><canvas id="pie_chart_keahlian_butuh" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Keahlian yang dibutuhkan terbanyak : {{$specialization_project[0]->name}}</div>
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
                    <div class="card-footer small text-muted">Keahlian yang tersedia terbanyak : {{$specialization_user[0]->name}}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Jumlah Transaksi
                    </div>
                    <div class="card-body"><canvas id="transactionCountChart" width="100%"></canvas></div>
                    <div class="card-footer small text-muted">Jumlah: {{ number_format($transaction_count['total']) }}</div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Total Transaksi
                    </div>
                    <div class="card-body"><canvas id="transactionSumChart" width="100%" ></canvas></div>
                    <div class="card-footer small text-muted">Total: {{ number_format($transaction_sum['total']) }}</div>
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
// Bar Chart Kota terbanyak sebagai titik coin
var ctx = document.getElementById("countCityChart");
var myLineChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            '{{$count_city[0]->city}}',
            '{{$count_city[1]->city}}',
            '{{$count_city[2]->city}}',
            '{{$count_city[3]->city}}',
            '{{$count_city[4]->city}}',
            '{{$count_city[5]->city}}',
            '{{$count_city[6]->city}}',
            '{{$count_city[7]->city}}',
            '{{$count_city[8]->city}}',
            '{{$count_city[9]->city}}'
        ],
        datasets: [{
            label: "Jumlah",
            backgroundColor: "rgba(2,117,216,1)",
            borderColor: "rgba(2,117,216,1)",
            data: [
                {{$count_city[0]->total}},
                {{$count_city[1]->total}},
                {{$count_city[2]->total}},
                {{$count_city[3]->total}},
                {{$count_city[4]->total}},
                {{$count_city[5]->total}},
                {{$count_city[6]->total}},
                {{$count_city[7]->total}},
                {{$count_city[8]->total}},
                {{$count_city[9]->total}}
            ],
        }],
    },
    options: {
        scales: {
            xAxes: [{
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                ticks: {
                    min: 0,
                    maxTicksLimit: 5
                },
                gridLines: {
                    display: true
                }
            }],
        },
        legend: {
            display: false
        }
    }
});

// Pie Chart Perbandingan User
var ctx = document.getElementById("pie_chart_user");
var pie_chart_user = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Gpro", "Gclient"],
        datasets: [{
        data: [{{$count_user_gpro}}, {{$count_user_gclient}}],
        backgroundColor: [ '#e90003', '#cc76ff'],
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
            backgroundColor: [
                // '#0404fc','#ff5722','#60BD68','#F17CB0','#4D4D4D','#5DA5DA','#B2912F','#9c27b0','#fcf404','#F15854',
                '{{$specialization_user[0]->color}}',
                '{{$specialization_user[1]->color}}',
                '{{$specialization_user[2]->color}}',
                '{{$specialization_user[3]->color}}',
                '{{$specialization_user[4]->color}}',
                '{{$specialization_user[5]->color}}',
                '{{$specialization_user[6]->color}}',
                '{{$specialization_user[7]->color}}',
                '{{$specialization_user[8]->color}}',
                '{{$specialization_user[9]->color}}'
            ],
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
            '{{$specialization_user[9]->name}}'
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
                {{$specialization_user[9]->user_specializations_count}}
            ],
            backgroundColor: [
                '{{$specialization_user[0]->color}}',
                '{{$specialization_user[1]->color}}',
                '{{$specialization_user[2]->color}}',
                '{{$specialization_user[3]->color}}',
                '{{$specialization_user[4]->color}}',
                '{{$specialization_user[5]->color}}',
                '{{$specialization_user[6]->color}}',
                '{{$specialization_user[7]->color}}',
                '{{$specialization_user[8]->color}}',
                '{{$specialization_user[9]->color}}'
            ],
        }],
    },
});


//Chart bar total transaksi
var ctx = document.getElementById("transactionSumChart");
var transactionSumChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Subscription", "Advertise", "Top Up", "Withdraw", "Project"],
        datasets: [{
            data: [
                {{ $transaction_sum['subscription'] }},
                {{ $transaction_sum['advertise'] }},
                {{ $transaction_sum['top_Up'] }},
                {{ $transaction_sum['withdraw'] }},
                {{ $transaction_sum['project'] }}
            ],
            backgroundColor: "rgb(75, 192, 192)",
            borderColor: "rgb(75, 192, 192)"
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function(label, index, labels) {
                        return Intl.NumberFormat().format(label);
                    }
                }
            }]
        },
        tooltips: {
            displayColors: false,
            callbacks: { 
                label: function(tooltipItem, data) { 
                    return 'Total Transaksi: '+tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            }, 
        },
        legend: {
            display: false
        }
    }
});

//Chart bar jumlah transaksi
var ctx = document.getElementById("transactionCountChart");
var transactionCountChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Subscription", "Advertise", "Top Up", "Withdraw", "Project"],
        datasets: [{
            data: [
                {{ $transaction_count['subscription'] }},
                {{ $transaction_count['advertise'] }},
                {{ $transaction_count['top_Up'] }},
                {{ $transaction_count['withdraw'] }},
                {{ $transaction_count['project'] }}
            ],
            backgroundColor: '#F23BAD',
            borderColor: '#F23BAD',
        }],
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    callback: function(label, index, labels) {
                        return Intl.NumberFormat().format(label);
                    }
                }
            }]
        },
        tooltips: {
            displayColors: false,
            callbacks: { 
                label: function(tooltipItem, data) { 
                    return 'Jumlah Transaksi: '+tooltipItem.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                },
            }, 
        },
        legend: {
            display: false
        }
    }
});
</script>
@endpush
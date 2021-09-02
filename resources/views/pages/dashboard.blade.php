@extends('layouts.default')

@section('title','Dashboard')

@section('content')
<main>
    <div class="container-fluid">
        <h2 class="mt-4 mb-4">Welcome, Admin!</h2>
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
</main>
@endsection

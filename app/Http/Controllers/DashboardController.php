<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectApplicant;
use App\Models\Specialization;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $count_total_user = User::where('roleId', '=', 'c7315ccc-c8c9-4e70-9b29-eedc9c872fa7')
            ->orWhere('roleId', '=', 'a0087d9f-5830-4878-9d23-fe99cfbe63e9')->count();
        $count_total_proyek = ProjectApplicant::where('status', '=', 'succeed')->orWhere('status', '=', 'waiting_approval')->count();
        $count_total_proyek_aktif = ProjectApplicant::where('status', '=', 'waiting_approval')->count();
        $count_total_proyek_cancel = ProjectApplicant::where('status', '=', 'canceled')->count();
        $count_total_proyek_sukses = ProjectApplicant::where('status', '=', 'succeed')->count();

        //Kota terbanyak sebagai titik coin
        $count_city = Project::select('city', DB::raw('count(*) as total'))
            ->groupBy('city')
            ->orderBy('total', 'desc')
            ->limit(10)
            ->get();

        //Pie Chart Perbandingan User
        $count_user_gpro = User::where('roleId', '=', 'c7315ccc-c8c9-4e70-9b29-eedc9c872fa7')->count();
        $count_user_gclient = User::where('roleId', '=', 'a0087d9f-5830-4878-9d23-fe99cfbe63e9')->count();

        //Pie Chart Keahlian yang dibutuhkan
        $specialization_project = Specialization::withCount('project_specializations')
            ->orderBy('project_specializations_count', 'DESC')
            ->limit(10)
            ->get();

        //Pie Chart Keahlian tersedia
        $specialization_user = Specialization::withCount('user_specializations')
            ->orderBy('user_specializations_count', 'DESC')
            ->limit(10)
            ->get();

        //Line chart total transaksi
        $transaction_sum = [
            'subscription' => Transaction::where('transactionTypeId', '781877e1-1ec5-4911-8414-6f0d3d220035')->sum('amount'),
            'advertise' => Transaction::where('transactionTypeId', '92484f57-e16c-4afa-9cf4-37811546c6af')->sum('amount'),
            'top_Up' => Transaction::where('transactionTypeId', 'a7f6a062-e005-40c9-bc9b-90fa22ee1a4d')->sum('amount'),
            'withdraw' => Transaction::where('transactionTypeId', 'b1c18e0e-96e8-456c-b247-348e475438f8')->sum('amount'),
            'project' => Transaction::where('transactionTypeId', 'd7d9110b-15c0-4613-8d27-f3f2fcd8a061')->sum('amount'),
            'total' => Transaction::sum('amount')
        ];

        //Line chart jumlah transaksi
        $transaction_count = [
            'subscription' => Transaction::where('transactionTypeId', '781877e1-1ec5-4911-8414-6f0d3d220035')->count(),
            'advertise' => Transaction::where('transactionTypeId', '92484f57-e16c-4afa-9cf4-37811546c6af')->count(),
            'top_Up' => Transaction::where('transactionTypeId', 'a7f6a062-e005-40c9-bc9b-90fa22ee1a4d')->count(),
            'withdraw' => Transaction::where('transactionTypeId', 'b1c18e0e-96e8-456c-b247-348e475438f8')->count(),
            'project' => Transaction::where('transactionTypeId', 'd7d9110b-15c0-4613-8d27-f3f2fcd8a061')->count(),
            'total' => Transaction::count()
        ];

        return view('pages.dashboard', [
            'count_total_user' => $count_total_user,
            'count_total_proyek' => $count_total_proyek,
            'count_total_proyek_aktif' => $count_total_proyek_aktif,
            'count_total_proyek_cancel' => $count_total_proyek_cancel,
            'count_total_proyek_sukses' => $count_total_proyek_sukses,
            'count_city' => $count_city,
            'count_user_gpro' => $count_user_gpro,
            'count_user_gclient' => $count_user_gclient,
            'specialization_project' => $specialization_project,
            'specialization_user' => $specialization_user,
            'transaction_sum' => $transaction_sum,
            'transaction_count' => $transaction_count
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    public function index()
    {
        $count_total_user = User::where('roleId','=','c7315ccc-c8c9-4e70-9b29-eedc9c872fa7')->orWhere('roleId','=','a0087d9f-5830-4878-9d23-fe99cfbe63e9')->count();
        // $count_kriteria = DB::table('kriteria_ahp')->count();
        // $count_penilaian = DB::table('penilaian')->count();
        return view('pages.dashboard', ['count_total_user' => $count_total_user]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProjectApplicant;
use App\Specialization;

class DashboardController extends Controller
{
    public function index()
    {
        $count_total_user = User::where('roleId','=','c7315ccc-c8c9-4e70-9b29-eedc9c872fa7')->orWhere('roleId','=','a0087d9f-5830-4878-9d23-fe99cfbe63e9')->count();
        $count_total_proyek = ProjectApplicant::where('status','=','succeed')->orWhere('status','=','waiting_approval')->count();
        $count_total_proyek_aktif = ProjectApplicant::where('status','=','waiting_approval')->count();
        $count_total_proyek_cancel = ProjectApplicant::where('status','=','canceled')->count();

        //Pie Chart Perbandingan User
        $count_user_gpro = User::where('roleId','=','c7315ccc-c8c9-4e70-9b29-eedc9c872fa7')->count();
        $count_user_gclient = User::where('roleId','=','a0087d9f-5830-4878-9d23-fe99cfbe63e9')->count();

        //Pie Chart Keahlian yang dibutuhkan
        $specialization_project = Specialization::withCount('project_specializations') 
            ->orderBy('project_specializations_count','DESC')
            ->limit(10) 
            ->get();

        //Pie Chart Keahlian tersedia
        $specialization_user = Specialization::withCount('user_specializations') 
            ->orderBy('user_specializations_count','DESC')
            ->limit(10) 
            ->get();

        //Chart Area Total User yang mendaftar
        // $user_create = User::withCount('user_specializations') 
        //     ->get();

        //Total user perbulan
        // $monthly_user = User::select(\DB::raw("COUNT(*) as count"), \DB::raw("DAYNAME(created_at) as day_name"), \DB::raw("DAY(created_at) as day"))
        // ->where('created_at', '>', Carbon::today()->subDay(6))
        // ->groupBy('day_name','day')
        // ->orderBy('day')
        // ->get();

        // $data = [];

        // foreach($monthly_user as $row) {
        //     $data['label'][] = $row->day_name;
        //     $data['data'][] = (int) $row->count;
        //   }
     
        // $data['chart_data'] = json_encode($data);
        
        return view('pages.dashboard', [
            'count_total_user' => $count_total_user,
            'count_total_proyek' => $count_total_proyek,
            'count_total_proyek_aktif' => $count_total_proyek_aktif,
            'count_total_proyek_cancel' => $count_total_proyek_cancel,
            'count_user_gpro' => $count_user_gpro,
            'count_user_gclient' => $count_user_gclient,
            'specialization_project' => $specialization_project,
            'specialization_user' => $specialization_user
            ] );
    }   
}

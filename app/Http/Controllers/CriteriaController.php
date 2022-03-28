<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialization;
use App\ProjectApplicant;

class CriteriaController extends Controller
{
    public function index()
    {
        
        $items = Specialization::with([
                'user_specializations',     //kriteria 3
                'project_specializations',  //kriteria 2,4
                'click_specializations',    //kriteria 6
                'user_specializations.project_applicants'
            ])
            // ->join('user_specializations', 'user_specializations.specializationId', '=', 'specializations.id')
            // ->join('project_applicants', 'project_applicants.userId', '=', 'user_specializations.userId')
            ->get();
            
        // dd($items);
        // $project_success = ProjectApplicant::where(
        //         'status','=','succeed'  //kriteria 5
        //     )->get();

        return view('pages.dss', [
            'items' => $items
        ]);
    }
}

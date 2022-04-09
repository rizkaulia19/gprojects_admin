<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use App\Repository\CriteriaRepository;

class CriteriaController extends Controller
{
    private CriteriaRepository $criteriaRepository;

    public function __construct(CriteriaRepository $criteriaRepository)
    {
        $this->criteriaRepository = $criteriaRepository;
    }

    public function index()
    {
        $criterias = $this->criteriaRepository->getCriteria();
        dd($criterias);
        // $rankCriteria = array_map(function ($criteria) {
        //     return [
        //         'c1' => $this->criteriaRepository->getCriteria()
        //     ];
        // }, $criterias);
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

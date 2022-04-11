<?php

namespace App\Http\Controllers;

use App\Services\Specialization\GetReportRankingSpecializationService;

class CriteriaController extends Controller
{
    public function index(GetReportRankingSpecializationService $service)
    {
        $this->setDataView(['items' => $service->getReport()]);
        return $this->returnView('pages.dss');
    }
}

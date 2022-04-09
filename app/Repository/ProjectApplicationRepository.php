<?php

use App\Models\ProjectApplicant;
use App\Repository\BaseRepository;

class ProjectApplicationRepository extends BaseRepository
{

    public function getCountStatusProject(): array
    {
        $count_total_proyek_aktif = ProjectApplicant::where('status', '=', 'waiting_approval')->count();
        $count_total_proyek_cancel = ProjectApplicant::where('status', '=', 'canceled')->count();
        $count_total_proyek_sukses = ProjectApplicant::where('status', '=', 'succeed')->count();
        return [
            'totalActive' => $count_total_proyek_aktif,
            'totalCancel' => $count_total_proyek_cancel,
            'totalSuccess' => $count_total_proyek_sukses
        ];
    }
}

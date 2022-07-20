<?php

namespace App\Services\Specialization;

use App\Repository\CriteriaRepository;

class GetReportRankingSpecializationService
{
    private const ID_KEY = 'id';
    private const NAME_KEY = 'name';
    private const S_VALUE_KEY = 'valueS';
    private CriteriaRepository $criteriaRepository;

    public function __construct(CriteriaRepository $criteriaRepository)
    {
        $this->criteriaRepository = $criteriaRepository;
    }

    public function getReport(): array
    {
        $criterias = $this->criteriaRepository->getCriteria();
        $valueS = [];
        $totalS = 0;
        $results = [];
        for ($i = 0; $i < count($criterias); $i++) {
            $valueS[] = $this->criteriaRepository->findC1($criterias[$i]['id']) *
                $this->criteriaRepository->findC2($criterias[$i]['id']) *
                $this->criteriaRepository->findC3($criterias[$i]['id']) *
                $this->criteriaRepository->findC4($criterias[$i]['id']) *
                $this->criteriaRepository->findC5($criterias[$i]['id']) *
                $this->criteriaRepository->findC6($criterias[$i]['id']);
            $results[] = [
                self::ID_KEY => $criterias[$i][self::ID_KEY],
                self::NAME_KEY => $criterias[$i][self::NAME_KEY],
                'total_applicant' => $this->criteriaRepository->countByField(
                    $criterias[$i][self::ID_KEY], ['applicant' => true]
                ),
                'revenue' => $this->criteriaRepository->getRevenueSpecialization($criterias[$i][self::ID_KEY]),
                'total_user' => count($criterias[$i]['user_specializations']),
                'total_project' => count($criterias[$i]['project_specializations']),
                'succeed_project' => $this->criteriaRepository->countByField($criterias[$i][self::ID_KEY], [
                    'project' => true,
                    'status_project' => 'succeed'
                ]),
                'total_click' => count($criterias[$i]['click_specializations']),
                self::S_VALUE_KEY => $valueS[$i]
            ];
            $totalS += $valueS[$i];
        }
        for ($rIndex = 0; $rIndex < count($results); $rIndex++) {
            $results[$rIndex] += [
                'score' => $results[$rIndex][self::S_VALUE_KEY] / $totalS
            ];
        }
        return array_values(collect($results)->sortBy('score')->toArray());
    }
}

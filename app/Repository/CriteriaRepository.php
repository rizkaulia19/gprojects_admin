<?php

namespace App\Repository;

use App\Models\ClickSpecialization;
use App\Models\Project;
use App\Models\ProjectApplicant;
use App\Models\ProjectSpecialization;
use App\Models\Specialization;
use App\Models\UserSpecialization;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CriteriaRepository extends BaseRepository
{
    private const C1_WEIGHT = 0.125;
    private const C2_WEIGHT = 0.2;
    private const C3_WEIGHT = 0.175;
    private const C4_WEIGHT = 0.3;
    private const C5_WEIGHT = 0.125;
    private const C6_WEIGHT = 0.075;

    public function getCriteria(): array
    {
        $query = Specialization::query();
        $query->with([
            'project_specializations',
            'user_specializations',
            'click_specializations'
        ]);
        return $this->extendQuery($query)->toArray();
    }

    public function findC1(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(new UserSpecialization, $specializationIds, 'userId', new ProjectApplicant, 'userId');
        return $query->count() * self::C1_WEIGHT;
    }

    public function findC2(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(new ProjectSpecialization, $specializationIds, 'projectId', new Project, 'id');
        $revenue = $query->sum('cost');
        return $revenue * self::C2_WEIGHT;
    }

    public function findC3(string $specializationIds = ''): float
    {
        return UserSpecialization::where('specializationId', $specializationIds)->count() * self::C3_WEIGHT;
    }

    public function findC4(string $specializationIds = ''): float
    {
        return ProjectSpecialization::where('specializationId', $specializationIds)->count() * self::C4_WEIGHT;
    }

    public function findC5(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(new ProjectSpecialization, $specializationIds, 'projectId', new ProjectApplicant, 'projectId');
        $query->where('status', 'succeed');
        return $query->count() * self::C5_WEIGHT;
    }

    public function findC6(string $specializationIds = ''): float
    {
        return ClickSpecialization::where('specializationId', $specializationIds)->count() * self::C6_WEIGHT;
    }

    private function getSpecializations(Model $specialModel, string $specializationIds = '', string $arrayColumn, Model $masterModel, string $filterIdColumn): Builder
    {
        $specializations = $specialModel::where('specializationId', $specializationIds)->get();
        $filteredIds = array_column($specializations->toArray(), $arrayColumn);
        return $masterModel::whereIn($filterIdColumn, $filteredIds);
    }
}

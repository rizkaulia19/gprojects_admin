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
    private const COST = "COST";
    private const BENEFIT = "BENEFIT";
    private $w1_Normalize;
    private $w2_Normalize;
    private $w3_Normalize;
    private $w4_Normalize;
    private $w5_Normalize;
    private $w6_Normalize;

    public function __construct()
    {
        $this->normalizeCriteria();
    }

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

    public function countByField(string $specializationsId, array $filters = []): int
    {
        $query = Specialization::query();
        $filerByApplicant = $filters['applicant'] ??= false;
        $filterByProject = $filters['project'] ??= false;
        if ($filerByApplicant) {
            $query->select([
                'specializations.*', 'project_app.id as appId', 'project_app.projectId', 'project_app.status as status', 'user.id as idUser'
            ]);
            $query->select([
                'project_app.id as appId', 'project_app.projectId', 'project_app.status as status', 'user.id as idUser'
            ]);
            $query->leftJoin('user_specializations as user', 'user.specializationId', '=', 'specializations.id');
            $query->leftJoin('project_applicants as project_app', 'project_app.userId', '=', 'user.userId');
            $query->where('specializations.id', $specializationsId);
            $query->whereNotNull('project_app.id');
            return $query->count();
        }
        if ($filterByProject) {
            $filerByStatus = $filters['status_project'] ??= 'succeed';
            $query->select(['specializations.*', 'project_app.id as appId', 'projects.id as projectId']);
            $query->leftJoin(
                'project_specializations as projects',
                'projects.specializationId',
                '=',
                'specializations.id'
            );
            $query->leftJoin(
                'project_applicants as project_app',
                'project_app.projectId',
                '=',
                'projects.projectId'
            );
            $query->where('specializations.id', $specializationsId);
            $query->where('project_app.status', $filerByStatus);
            return $query->count();
        }
    }

    public function getRevenueSpecialization(string $specializationsId = ''): int
    {
        $query = $this->getSpecializations(
            new ProjectSpecialization,
            $specializationsId,
            'projectId',
            new Project,
            'id'
        );
        return $query->sum('cost');
    }

    public function findW1(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(
            new UserSpecialization, $specializationIds, 'userId', new ProjectApplicant, 'userId'
        );
        if ($this->w1_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->w1_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->w1_Normalize['value']);
    }

    public function findW2(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(
            new ProjectSpecialization, $specializationIds, 'projectId', new Project, 'id'
        );
        $revenue = $query->sum('cost');
        if ($this->w2_Normalize['type'] == self::COST) {
            return pow($revenue, -$this->w2_Normalize['value']);
        }
        return pow($revenue, $this->w2_Normalize['value']);
    }

    public function findW3(string $specializationIds = ''): float
    {
        $query = UserSpecialization::where('specializationId', $specializationIds);
        if ($this->w3_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->w3_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->w3_Normalize['value']);
    }

    public function findW4(string $specializationIds = ''): float
    {
        $query = ProjectSpecialization::where('specializationId', $specializationIds);
        if ($this->w4_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->w4_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->w4_Normalize['value']);
    }

    public function findW5(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(
            new ProjectSpecialization, $specializationIds, 'projectId', new ProjectApplicant, 'projectId'
        );
        $query->where('status', 'succeed');
        if ($this->w5_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->w5_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->w5_Normalize['value']);
    }

    public function findW6(string $specializationIds = ''): float
    {
        $query = ClickSpecialization::where('specializationId', $specializationIds);
        if ($this->w6_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->w6_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->w6_Normalize['value']);
    }

    private function getSpecializations(
        Model $specialModel, string $specializationIds = '', string $arrayColumn,
        Model $masterModel, string $filterIdColumn
    ): Builder {
        $specializations = $specialModel::where('specializationId', $specializationIds)->get();
        $filteredIds = array_column($specializations->toArray(), $arrayColumn);
        return $masterModel::whereIn($filterIdColumn, $filteredIds);
    }

    private function normalizeCriteria()
    {
        $w1 = 12.5;
        $w2 = 20;
        $w3 = 17.5;
        $w4 = 30;
        $w5 = 12.5;
        $w6 = 7.5;
        $totalW = $w1 + $w2 + $w3 + $w4 + $w5 + $w6;
        $typeCost = self::COST;
        $typeBenefit = self::BENEFIT;

        $this->w1_Normalize = ['type' => $typeCost, 'value' => ($w1 / $totalW)];
        $this->w2_Normalize = ['type' => $typeBenefit, 'value' => ($w2 / $totalW)];
        $this->w3_Normalize = ['type' => $typeCost, 'value' => ($w3 / $totalW)];
        $this->w4_Normalize = ['type' => $typeBenefit, 'value' => ($w4 / $totalW)];
        $this->w5_Normalize = ['type' => $typeBenefit, 'value' => ($w5 / $totalW)];
        $this->w6_Normalize = ['type' => $typeCost, 'value' => ($w6 / $totalW)];
    }
}

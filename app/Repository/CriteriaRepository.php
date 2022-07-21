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
    private const NON_COST = "NON_COST";
    private $c1_Normalize;
    private $c2_Normalize;
    private $c3_Normalize;
    private $c4_Normalize;
    private $c5_Normalize;
    private $c6_Normalize;

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
                'specializations.*', 'project_app.id as appId', 'project_app.projectId',
                'project_app.status as status', 'user.id as idUser'
            ]);
            $query->select([
                'project_app.id as appId', 'project_app.projectId', 'project_app.status as status',
                'user.id as idUser'
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

    public function findC1(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(
            new UserSpecialization,
            $specializationIds,
            'userId',
            new ProjectApplicant,
            'userId'
        );
        if ($this->c1_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->c1_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->c1_Normalize['value']);
    }

    public function findC2(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(
            new ProjectSpecialization,
            $specializationIds,
            'projectId',
            new Project,
            'id'
        );
        $revenue = $query->sum('cost');
        if ($this->c2_Normalize['type'] == self::COST) {
            return pow($revenue, -$this->c2_Normalize['value']);
        }
        return pow($revenue, $this->c2_Normalize['value']);
    }

    public function findC3(string $specializationIds = ''): float
    {
        $query = UserSpecialization::where('specializationId', $specializationIds);
        if ($this->c3_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->c3_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->c3_Normalize['value']);
    }

    public function findC4(string $specializationIds = ''): float
    {
        $query = ProjectSpecialization::where('specializationId', $specializationIds);
        if ($this->c4_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->c4_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->c4_Normalize['value']);
    }

    public function findC5(string $specializationIds = ''): float
    {
        $query = $this->getSpecializations(
            new ProjectSpecialization,
            $specializationIds,
            'projectId',
            new ProjectApplicant,
            'projectId'
        );
        $query->where('status', 'succeed');
        if ($this->c5_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->c5_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->c5_Normalize['value']);
    }

    public function findC6(string $specializationIds = ''): float
    {
        $query = ClickSpecialization::where('specializationId', $specializationIds);
        if ($this->c6_Normalize['type'] == self::COST) {
            return $query->count() === 0 ? 0.0 : pow($query->count(), -$this->c6_Normalize['value']);
        }
        return $query->count() === 0 ? 0.0 : pow($query->count(), $this->c6_Normalize['value']);
    }

    private function getSpecializations(
        Model $specialModel,
        string $specializationIds = '',
        string $arrayColumn,
        Model $masterModel,
        string $filterIdColumn
    ): Builder {
        $specializations = $specialModel::where('specializationId', $specializationIds)->get();
        $filteredIds = array_column($specializations->toArray(), $arrayColumn);
        return $masterModel::whereIn($filterIdColumn, $filteredIds);
    }

    private function normalizeCriteria()
    {
        $c1 = 12.5;
        $c2 = 20;
        $c3 = 17.5;
        $c4 = 30;
        $c5 = 12.5;
        $c6 = 7.5;
        $this->c1_Normalize = ['type' => self::COST, 'value' => ($c1 / ($c1 + $c2 + $c3 + $c4 + $c5 + $c6))];
        $this->c2_Normalize = ['type' => self::NON_COST, 'value' => $c2 / ($c1 + $c2 + $c3 + $c4 + $c5 + $c6)];
        $this->c3_Normalize = ['type' => self::COST, 'value' => ($c3 / ($c1 + $c2 + $c3 + $c4 + $c5 + $c6))];
        $this->c4_Normalize = ['type' => self::NON_COST, 'value' => $c4 / ($c1 + $c2 + $c3 + $c4 + $c5 + $c6)];
        $this->c5_Normalize = ['type' => self::NON_COST, 'value' => $c5 / ($c1 + $c2 + $c3 + $c4 + $c5 + $c6)];
        $this->c6_Normalize = ['type' => self::COST, 'value' => ($c6 / ($c1 + $c2 + $c3 + $c4 + $c5 + $c6))];
    }
}

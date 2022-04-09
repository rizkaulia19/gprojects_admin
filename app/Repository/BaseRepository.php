<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * @param Builder $query 
     * @param array $options 
     * @return Collection 
     */
    protected function extendQuery(Builder $query, array $options = []): Collection
    {
        $limit = $options['limit'] ??= 10;
        $page = $options['page'] ??= 1;
        $sort = $options['sort'] ??= false;
        $orderBy = $options['order_by'] ??= null;
        if ($orderBy) {
            $query->orderBy($orderBy, boolval($sort), 'desc');
        }
        return $query->get();
    }
}

<?php
namespace App\Filters;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class PageFilter implements Filter
{
    public function apply(Builder $builder, $filter)
    {

        return $builder->limit(10)->skip($filter*10);

    }
}

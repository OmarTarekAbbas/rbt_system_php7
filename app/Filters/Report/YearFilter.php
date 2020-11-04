<?php
namespace App\Filters\Report;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class YearFilter implements Filter
{
    public function apply(Builder $builder, $filter)
    {

        return $builder->where('year', $filter);

    }
}

<?php
namespace App\Filters\Report;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class RbtTitleFilter implements Filter
{
    public function apply(Builder $builder, $filter)
    {
        return $builder->where('rbt_name', 'like', '%'.$filter.'%');

    }
}

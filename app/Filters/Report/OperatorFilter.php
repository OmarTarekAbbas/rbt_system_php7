<?php
namespace App\Filters\Report;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class OperatorFilter implements Filter
{
    public function apply(Builder $builder, $filter)
    {

      return $builder->where('operator_id',  $filter);

    }
}

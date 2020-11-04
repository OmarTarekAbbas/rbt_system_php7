<?php
namespace App\Filters\Report;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class AggregatorFilter implements Filter
{
    public function apply(Builder $builder, $filter)
    {

      return $builder->where('aggregator_id',  $filter);

    }
}

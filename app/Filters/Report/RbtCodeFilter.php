<?php
namespace App\Filters\Report;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class RbtCodeFilter implements Filter
{
    public function apply(Builder $builder, $filter)
    {

      return $builder->where('code', 'like', '%'.$filter.'%');

    }
}

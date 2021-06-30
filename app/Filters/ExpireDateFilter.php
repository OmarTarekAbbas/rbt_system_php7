<?php

namespace App\Filters;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ExpireDateFilter implements Filter
{
  public function apply(Builder $builder, $filter)
  {
    return $builder->whereYear('contract_expiry_date',  $filter);
  }
}

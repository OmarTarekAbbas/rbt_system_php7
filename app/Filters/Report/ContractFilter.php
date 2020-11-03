<?php
namespace App\Filters\Report;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class ContractFilter implements Filter
{
    public function apply(Builder $builder, $filter)
    {

        return $builder->where('contract_id',  $filter);

    }
}

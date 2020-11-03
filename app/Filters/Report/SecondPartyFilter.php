<?php
namespace App\Filters\Report;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class SecondPartyFilter implements Filter
{
    public function apply(Builder $builder, $filter)
    {

        return $builder->where('second_party_id',  $filter);

    }
}

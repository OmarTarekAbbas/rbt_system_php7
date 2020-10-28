<?php
namespace App\Http\Repository;

use App\ContractRenew;
use Illuminate\Http\Request;

class ContractRenewRepository
{
    private $contractRenew;

    /**
     * __construct
     *
     * @param  ContractRenew $contractRenew
     * @return void
     */
    public function __construct(ContractRenew $contractRenew)
    {
        $this->contractRenew = $contractRenew;
    }

    /**
     * __call
     *
     * @param  function $method
     * @param  mixed $arguments
     * @return Closure
     */
    public function __call($method, $args)
    {
        return call_user_func_array([$this->contractRenew, $method], $args);
    }
}

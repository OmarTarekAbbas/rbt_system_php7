<?php
namespace App\Http\Repository;

use App\Contract;
use Illuminate\Http\Request;

class ContractRepository
{
    private $contract;

    /**
     * __construct
     *
     * @param  Contract $contract
     * @return void
     */
    public function __construct(Contract $contract)
    {
        $this->contract = $contract;
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
        return call_user_func_array([$this->contract, $method], $args);
    }
}

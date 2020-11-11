<?php
namespace App\Http\Repository;

use App\ContractRequest;

class ContractRequestRepository
{
    private $contractRequest;

    /**
     * __construct
     *
     * @param  ContractRequest $contractRequest
     * @return void
     */
    public function __construct(ContractRequest $contractRequest)
    {
        $this->contractRequest = $contractRequest;
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
        return call_user_func_array([$this->contractRequest, $method], $args);
    }
}

<?php
namespace App\Http\Repository;

use App\ClientPayment;
use Illuminate\Http\Request;

class ClientPaymentRepository
{
    private $clientPayment;

    /**
     * __construct
     *
     * @param  ClientPayment $clientPayment
     * @return void
     */
    public function __construct(ClientPayment $clientPayment)
    {
        $this->clientPayment = $clientPayment;
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
        return call_user_func_array([$this->clientPayment, $method], $args);
    }
}

<?php
namespace App\Http\Repository;

use App\SecondParty;
use Illuminate\Http\Request;

class SecondPartyTypeRepository
{
    private $SecondPartyType;

    /**
     * __construct
     *
     * @param  SecondParty $setting
     * @return void
     */
    public function __construct(SecondParty $SecondPartyType)
    {
        $this->SecondPartyType = $SecondPartyType;
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
        return call_user_func_array([$this->SecondPartyType, $method], $args);
    }
}

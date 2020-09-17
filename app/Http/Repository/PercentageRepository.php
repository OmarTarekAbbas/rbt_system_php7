<?php
namespace App\Http\Repository;

use App\Percentage;
use Illuminate\Http\Request;

class PercentageRepository
{
    private $percentage;

    /**
     * __construct
     *
     * @param  Percentage $percentage
     * @return void
     */
    public function __construct(Percentage $percentage)
    {
        $this->percentage = $percentage;
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
        return call_user_func_array([$this->percentage, $method], $args);
    }
}

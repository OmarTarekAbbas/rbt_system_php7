<?php
namespace App\Http\Repository;

use App\Firstpartie;
use Illuminate\Http\Request;

class FirstpartieRepository
{
    private $firstpartie;

    /**
     * __construct
     *
     * @param  Firstpartie $firstpartie
     * @return void
     */
    public function __construct(Firstpartie $firstpartie)
    {
        $this->firstpartie = $firstpartie;
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
        return call_user_func_array([$this->firstpartie, $method], $args);
    }
}

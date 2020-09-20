<?php
namespace App\Http\Repository;

use App\SecondParties;

class SecondPartyRepository {

  /**
   * SecondParties
   *
   * @var SecondParties $SecondParties
   */
  private $SecondParties;

  /**
   * __construct
   *
   * @param SecondParties $SecondParties
   */
  public function __construct(SecondParties $SecondParties)
  {
    $this->SecondParties = $SecondParties;
  }

  /**
   * __call
   *
   * @param method $method
   * @param mixed $args
   * @return Closure
   */
  public function __call($method, $args)
  {
    return call_user_func_array([$this->SecondParties, $method], $args);
  }

}

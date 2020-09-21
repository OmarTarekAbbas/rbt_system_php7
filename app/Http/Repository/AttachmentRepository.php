<?php
namespace App\Http\Repository;

use App\Attachement;

class AttachementRepository {

  /**
   * Attachement
   *
   * @var Attachement $Attachement
   */
  private $Attachement;

  /**
   * __construct
   *
   * @param Attachement $Attachement
   */
  public function __construct(Attachement $Attachement)
  {
    $this->Attachement = $Attachement;
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
    return call_user_func_array([$this->Attachement, $method], $args);
  }

}

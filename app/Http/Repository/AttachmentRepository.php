<?php
namespace App\Http\Repository;

use App\Attachment;

class AttachmentRepository {

  /**
   * Attachment
   *
   * @var Attachment $Attachment
   */
  private $Attachment;

  /**
   * __construct
   *
   * @param Attachment $Attachment
   */
  public function __construct(Attachment $Attachment)
  {
    $this->Attachment = $Attachment;
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
    return call_user_func_array([$this->Attachment, $method], $args);
  }

}

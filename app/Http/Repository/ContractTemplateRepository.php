<?php
namespace App\Http\Repository;

use App\ContractTemplate;
use Illuminate\Http\Request;

class ContractTemplateRepository
{
    private $ContractTemplate;

    /**
     * __construct
     *
     * @param  ContractTemplate $ContractTemplate
     * @return void
     */
    public function __construct(ContractTemplate $ContractTemplate)
    {
        $this->ContractTemplate = $ContractTemplate;
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
        return call_user_func_array([$this->ContractTemplate, $method], $args);
    }
}

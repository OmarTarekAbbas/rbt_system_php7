<?php
namespace App\Http\Repository;

use App\ContractTemplateItem;
use Illuminate\Http\Request;

class ContractTemplateItemRepository
{
    private $ContractTemplateItem;

    /**
     * __construct
     *
     * @param  ContractTemplateItem $ContractTemplateItem
     * @return void
     */
    public function __construct(ContractTemplateItem $ContractTemplateItem)
    {
        $this->ContractTemplateItem = $ContractTemplateItem;
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
        return call_user_func_array([$this->ContractTemplateItem, $method], $args);
    }
}

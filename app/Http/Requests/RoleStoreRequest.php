<?php

namespace App\Http\Requests;

use App\Http\Repository\RoleRepository;
use App\Http\Requests\Request;

class RoleStoreRequest extends Request
{
    /**
     * roleRepository
     *
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * __construct
     * inject needed data in constructor
     * @param  RoleRepository $roleRepository
     * @return void
     */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository    = $roleRepository;
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       return [
            'name' => [
                'required',
                function($attr, $value, $fail) {
                    $role = $this->roleRepository->where('name',$value)->first();
                    if ($role)
                    {
                        $fail('This role already exists');
                    }
                }
            ],
            'role_priority' => 'required',
       ];
    }
}

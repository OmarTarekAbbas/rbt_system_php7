<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class UserUpdateRequest extends Request
{
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->segment(2),
            'role' => [
              'required',
               function($attribute, $value, $fail) {
                if( strpos($value,'ceo') !== false ) { // role ceo
                  $users = User::join('user_has_roles', 'users.id', '=', 'user_has_roles.user_id')
                  ->join('roles','user_has_roles.role_id','=','roles.id')
                  ->where('roles.name','like','%'.$value.'%')
                  ->where('user_id','!=',$this->segment(2))
                  ->get();
                  if($users->count()){
                    $fail('Only One User Can Take This Role');
                  }
                }
              }
            ],
            'password' => '',
            "aggregator_id" => ""
       ];
    }
}

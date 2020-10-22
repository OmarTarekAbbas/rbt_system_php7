<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee_contracts extends Model
{
    //
    protected $table = 'employee_contracts';
    protected $fillable = ['employee_id','sign_date','contract_period','end_date','contract_status','contract_attachment'];

    public function Employees()
	{
		return $this->belongsTo('App\Employees','employee_id');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{

  protected $table = 'employees';
  protected $fillable = ['full_name','phone','status','release_date','birth_certificate','graduation_certificate','army_certificate','insurance_certificate','fish_watashbih'];

    public function employee_contracts()
    {
      return $this->hasMany('App\Employee_contracts','employee_id','id');
    }
}

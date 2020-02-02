<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['title','email','manager_id'];


    public function manager()
    {
        return $this->belongsTo('App\User','manager_id');
    }
}

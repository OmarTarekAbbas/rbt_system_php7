<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['notifier_id','notified_id','subject','link','seen'];
}

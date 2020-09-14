<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Occasion.
 *
 * @author  The scaffold-interface created at 2017-08-02 09:16:53am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ContractService extends Model
{


    protected $table = 'contract_services';
    protected $fillable = [
        'contract_id',
        'title',
    ];

    public function contract()
    {
        return $this->belongsTo('App\Contract');
    }

}

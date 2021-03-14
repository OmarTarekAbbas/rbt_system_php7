<?php

namespace App;

use App\Contract;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['attachment_code', 'contract_id', 'attachment_type', 'attachment_title', 'attachment_date', 'attachment_expiry_date', 'contract_expiry_date', 'attachment_pdf', 'attachment_status', 'notes'];

    //protected $dates = ['attachment_date', 'attachment_expiry_date', 'contract_expiry_date'];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }

    public function getAttachmentTypeAttribute($value)
    {
      switch ($value){
        case 1: return 'Annex';
        case 2: return 'Authorization';
        case 3: return 'Copyright';
        default: return 'Error';
      }
    }

    public function getAttachmentStatusAttribute($value)
    {
      switch ($value){
        case 1: return 'Active';
        case 0: return 'Expired';
        default: return 'Error';
      }
    }

    public function getAttachmentPdfAttribute($value)
    {
      if(strpos($value, 'uploads/attachments') !== false) {
        return $value;
      }
      return 'uploads/attachments/'.$value;
    }
}

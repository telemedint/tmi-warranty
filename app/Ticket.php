<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'applicant_name', 'applicant_phone', 'detials', 'device_id', 
    ];

    public function device(){
        return $this->belongsTo(Device::class);
    }
}

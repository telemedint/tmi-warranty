<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'client_id', 'device_id', 'purchase_date', 'technical_support', 'repairing_service', 'premium_support', 
        'technical_support_chk', 'repairing_service_chk', 'premium_support_chk',
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function device(){
        // return $this->belongsTo('App\Device', 'device_serial', 'full_serial');
        return $this->belongsTo('App\Device');
    }
}

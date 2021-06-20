<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'client_id', 'device_serial', 'purchase_date', 'technical_support', 'repairing_service', 'premium_support', 
    ];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}

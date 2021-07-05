<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'company', 'email', 'phone', 'address',
    ];

    public function invoice(){
        return $this->hasOne('App\Invoice');
    }
}

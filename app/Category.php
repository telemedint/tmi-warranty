<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'code', 'serial'
    ];

    public function devices()
    {
        return $this->hasMany('App\Device');
    }
}

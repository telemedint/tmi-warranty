<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name', 'path',
    ];

    public function devices(){
        return $this->hasMany(Device::class);
    }
}

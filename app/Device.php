<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name', 'full_serial', 'serial_first', 'serial_second', 'image', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
}

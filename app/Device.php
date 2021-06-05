<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name', 'serial', 'image', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name', 'full_serial', 'serial_first', 'serial_second', 'image', 'stored_at', 'category_id', 'photo_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function invoice(){
        // return $this->hasOne('App\Invoice', 'full_serial', 'device_serial');
        return $this->hasOne('App\Invoice');
    }

    public function tickets(){
        return $this->hasMany(Ticket::class, 'device_id');
    }

    public function photo(){
        return $this->belongsTo(Photo::class);
    }
    
}

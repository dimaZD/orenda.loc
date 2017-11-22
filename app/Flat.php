<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    protected $fillable = ['name', 'lat', 'lng', 'image', 'advantages', 'seats', 'description', 'map'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }
}

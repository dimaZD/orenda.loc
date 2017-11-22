<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'user_id',
        'flat_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function flat()
    {
        return $this->belongsTo('App\Flat');
    }
}

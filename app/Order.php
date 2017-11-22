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

    public function scopeBooked($query, $inputs)
    {
        return $query->where(function ($query) use ($inputs) {
            $query->where(function ($query) use ($inputs) {
                $query->where('start_date', '<=', $inputs['start_date'])
                    ->where('end_date', '>=', $inputs['start_date']);
            })->orWhere(function ($query) use ($inputs) {
                $query->where('start_date', '>=', $inputs['start_date'])
                    ->where('end_date', '<=', $inputs['end_date']);
            })->orWhere(function ($query) use ($inputs) {
                $query->where('start_date', '<=', $inputs['end_date'])
                    ->where('end_date', '>=', $inputs['end_date']);
            })->orWhere(function ($query) use ($inputs) {
                $query->where('start_date', '<=', $inputs['start_date'])
                    ->where('end_date', '>=', $inputs['end_date']);
            });
        })->where('status', '1');
    }
}

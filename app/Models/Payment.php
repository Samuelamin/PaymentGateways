<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = ['id'];
    const STATUS_ACTIVE = 1;

    public function scopeActive($query)
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }


    
}

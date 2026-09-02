<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'store_url',
        'current_platform',
        'monthly_orders',
    ];
}

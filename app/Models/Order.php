<?php

// Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_price'];

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}



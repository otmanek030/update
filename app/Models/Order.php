<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'total_price',
        // Add other fields as needed
    ];

    public function items()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')
                    ->withPivot('quantity', 'price'); // Adjust the pivot columns as per your database schema
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

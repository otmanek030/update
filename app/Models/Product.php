<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'photo','type'];

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_products') // Explicitly mention the table name
                    ->withPivot('quantity', 'price');
    }
}

<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProduct extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural of the model name
    protected $table = 'user_products';

    // Define the fillable attributes
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

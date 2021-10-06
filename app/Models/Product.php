<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'description',
        'stock',
        'price',
        'status',
    ];

    public function orders()
    {
        return $this->belongsToMany(Orders::class)->withPivot('quantity');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
}

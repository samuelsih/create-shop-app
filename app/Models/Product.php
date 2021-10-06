<?php

namespace App\Models;

// use App\Models\Cart;
// use App\Models\Image;

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
        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }

    public function carts()
    {
        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}

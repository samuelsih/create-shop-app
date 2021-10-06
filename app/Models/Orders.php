<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payments;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function payment()
    {
        return $this->hasOne(Payments::class);
    }

    public function user()
    {
        //nama foreign key nya customer_id
        //sedangkan kalo kita buat seperti yang di payment, nanti kebaca nya user_id
        //makanya tambahkan parameter baru untuk klarifikasi nama foreign key nya
        return $this->belongsTo(User::class, 'customer_id');
    }
}

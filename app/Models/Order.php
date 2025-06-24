<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'status', 'pickup_method', 'payment_method', 'total_amount', 'is_paid'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // 🔧 Tambahkan relasi ini untuk mengakses nama user pemesan
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

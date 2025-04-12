<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 'user_id', 'address', 'coupon_id', 
        'shipping_fee', 'discount_amount', 'total_price', 
        'payment_method', 'payment_status', 'order_status', 'note'
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'shipping_fee' => 'decimal:2',
        'discount_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // public function coupon()
    // {
    //     return $this->belongsTo(Coupon::class);
    // }

}

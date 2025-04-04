<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'user_id',
        'address',
        'coupon_id',
        'total_price',
        'shipping_fee',
        'discount_amount',
        'payment_method',
        'payment_status',
        'order_status',
        'note',
        'created_at',
        'updated_at'
    ];
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

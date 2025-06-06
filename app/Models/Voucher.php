<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'title',
        'voucher_type',
        'value',
        'discount_type',
        'min_order_value',
        'max_discount_value',
        'limit',
        'is_active',
        'start_date',
        'end_date',
    ];
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public static function validateDiscount($code)
    {
        $voucher = Voucher::where('code', $code)
            ->where('is_active', true)
            ->where('end_date', '>=', now()) // Kiểm tra ngày hết hạn
            ->first();

        return $voucher;
    }
}   

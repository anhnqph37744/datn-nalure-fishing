<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
       'name', 'id_user', 'id_product', 'variant_id', 'quantity', 'price', 'total' ,'image'
    ];
    public static function getItems()
    {
        // Logic của phương thức tĩnh
        return self::all();  // Ví dụ: trả về tất cả các mục trong giỏ hàng
    }
    
}

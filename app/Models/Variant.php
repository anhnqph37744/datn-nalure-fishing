<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'quantity',
        'weight',
        'description',
        'image',
        'active',
    ];
    public function varianAttributeValue()
    {
        return $this->hasMany(VariantAttributeValue::class, 'variant_id', 'id');
    }
}

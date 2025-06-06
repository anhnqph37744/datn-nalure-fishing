<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'quantity',
        'quantity_warning',
        'weight',
        'tags',
        'description',
        'category_id',
        'brand_id',
        'image',
        'instructional_images',
        'active',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function images()
    {
        return $this->hasMany(ProductAttackment::class, 'product_id', 'id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }
    public function variant() {
        return $this->hasMany(Variant::class);
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderItem::class);
    }
}

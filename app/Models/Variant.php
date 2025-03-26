<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    public function varianAttributeValue()
    {
        return $this->hasMany(VariantAttributeValue::class, 'variant_id', 'id');
    }
}

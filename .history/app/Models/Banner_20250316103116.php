<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banners';

    protected $fillable = [
        'tieu_de',
        'noi_dung',
        'loai_banner',
        'trang_thai',
    ];

    const TRANG_THAI = [
        'an' => 'Ẩn',
        'hien' => 'Hiện',
    ];
    public function getTrangThaiTextAttribute()
    {
        return self::TRANG_THAI[$this->trang_thai];
    }
    public function hinhAnhBanner()
    {
        return $this->hasMany(HinhAnhBa::class, 'banner_id');
    }
}

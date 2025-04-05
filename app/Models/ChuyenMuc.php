<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuyenMuc extends Model
{
    use HasFactory;
    protected $table = 'chuyen_mucs';

    protected $fillable = [
        'ten_chuyen_muc',
        'chuyen_muc_cha_id',
        'trang_thai',
    ];
    const TRANG_THAI = [
        'an' => 'Ẩn',
        'hien' => 'Hiện',
    ];

    // tạo mối quan hệ đệ quy với chính nó (chuyên mục cha)
    public function chuyenMucCha()
    {
        return $this->belongsTo(ChuyenMuc::class, 'chuyen_muc_cha_id');
    }

    // Tạo mối quan hệ với các chuyên mục con
    public function chuyenMucCons()
    {
        return $this->hasMany(ChuyenMuc::class, 'chuyen_muc_cha_id');
    }

    // tạo mối quan hệ với bài viet
    public function baiViets()
    {
        return $this->hasMany(BaiViet::class, 'chuyen_muc_id');
    }
    public function getTrangThaiTextAttribute()
    {
        return self::TRANG_THAI[$this->trang_thai];
    }
}

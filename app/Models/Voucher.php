<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;
    // use SoftDeletes;
    protected $table = 'vouchers';
    protected $fillable = ['kode_voucher','barang_id', 'deskripsi', 'max_user', 'use_user',  'diskon','deskripsi', 'promo_nominal', 'tgl_mulai', 'tgl_kadaluarsa'];
    // protected $dates = ['deleted_at'];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}

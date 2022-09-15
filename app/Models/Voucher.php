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
    protected $fillable = ['kode_voucher','barang_id', 'max_user', 'use_user',  'diskon','deskripsi', 'jumlah_pembelian', 'jenis_voucher', 'tgl_kadaluarsa'];
    // protected $dates = ['deleted_at'];

    public function barang(){
        return $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}

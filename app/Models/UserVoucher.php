<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVoucher extends Model
{
    use HasFactory;
    protected $table = 'user_vouchers';
    protected $fillable = ['user_id', 'voucher_id', 'status', 'tgl_kadaluarsa', 'waktu'];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function voucher(){
        return $this->hasOne(Voucher::class, 'id', 'voucher_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['user_id','number', 'total_price', 'payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token'];
    protected $hidden = ['payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token'];
    use HasFactory;

    public function transaksi(){
        return $this->hasOne(Transaksi::class, 'id','transaksi_id');
    }
    public function user()
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
}

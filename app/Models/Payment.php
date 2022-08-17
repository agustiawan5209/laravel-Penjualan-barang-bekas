<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = ['user_id','number', 'total_price', 'payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token', 'item_details', 'pemilik_barang'];
    protected $hidden = ['payment_status', 'payment_type', 'payment_code', 'pdf_url', 'transaksi_id', 'snap_token'];
    use HasFactory;

    public function ongkir(){
        return $this->belongsTo(ongkir::class, 'transaksi_id','transaksi_id');
    }
    public function user()
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
}

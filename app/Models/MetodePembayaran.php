<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'metode_pembayarans';
    protected $fillable = [
        'user_id',
        'metode',
        'qr_code',
        'no_rekening',
        'nama_pemilik',
    ];
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
}

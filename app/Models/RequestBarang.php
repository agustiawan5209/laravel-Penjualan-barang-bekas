<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBarang extends Model
{
    protected $table = "request_barangs";
    protected $fillable = [
        'user_id','nama_produk','foto_produk','harga','deskripsi','categories','Alamat'
    ];
    protected $hidden = ['user_id'];
    use HasFactory;

    /**
     * user
     *  Relasi Ke User;
     * @return void
     */
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

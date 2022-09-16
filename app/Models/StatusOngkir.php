<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusOngkir extends Model
{
    use HasFactory;
    protected $table = 'status_ongkirs';
    protected $fillable = ['ongkir_id', 'ket'];

    public function ongkir(){
        return $this->hasOne(ongkir::class ,'id', 'ongkir_id');
    }
}

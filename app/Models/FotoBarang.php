<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotoBarang extends Model
{
    use HasFactory;

    protected $table = 'foto_barangs';
    protected $fillable = ['barang_id', 'foto', 'default','jenis'];

    public function barang(){
        $this->hasOne(Barang::class, 'id', 'barang_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'diskons';
    protected $fillable = ['barang_id', 'diskon', 'tgl_mulai', 'tgl_kadaluarsa'];

    protected $hidden = ['barang_id'];
    use HasFactory;
}

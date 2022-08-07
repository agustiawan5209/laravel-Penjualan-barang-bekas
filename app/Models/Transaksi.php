<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $filable = ['ID_transaksi','tgl_transaksi','gross_amount'];
    use HasFactory;
}

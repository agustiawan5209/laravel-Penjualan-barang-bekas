<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = 'kategory';

    use HasFactory;
    public function barang(){
        return $this->belongsTo(Barang::class);
    }
}

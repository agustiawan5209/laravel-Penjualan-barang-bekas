<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlidePage extends Model
{
    protected $table = 'slide_pages';
    protected $fillable = [
        'slide','deskripsi','thumbnail'
    ];
    protected $hidden =['slide', 'thumbnail'];
    use HasFactory;
}

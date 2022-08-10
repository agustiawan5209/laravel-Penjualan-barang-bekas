<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoUser extends Model
{
    protected $table = 'promo_users';
    protected $fillable = ['user_id', 'promo_id'];
    protected $hidden  = [
        'user_id',
        'promo_id',
    ];
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function promo(){
        return $this->hasOne(Promo::class, 'id', 'promo_id');
    }
}

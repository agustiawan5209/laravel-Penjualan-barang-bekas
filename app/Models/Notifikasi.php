<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Notifikasi extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'id','type','notifiable_type','notifiable_id','data','read_at',
    ];
    use HasFactory;
    use Notifiable;
}

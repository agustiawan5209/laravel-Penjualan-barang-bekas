<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\PesanChat
 *
 * @property int $id
 * @property int $chat_id
 * @property int $from
 * @property int $to
 * @property string $body
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PesanChatFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat query()
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat whereFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PesanChat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PesanChat extends Model
{
    use Notifiable;
    use HasFactory;
    protected $table = 'pesan_chats';
    protected $fillable = [
        'chat_id','from', 'to', 'body','status'
    ];
    public function chatid(){
        return $this->hasOne(Chatid::class,'id', 'chat_id');
    }
    public function Admin(){
        return $this->hasOne(User::class, 'id', 'from');
    }
    public function user(){
        return $this->hasOne(User::class, 'id', 'to');
    }
}

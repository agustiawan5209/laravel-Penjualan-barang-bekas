<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ongkir
 *
 * @property int $id
 * @property string $transaksi_id
 * @property string|null $tgl_pengiriman
 * @property int|null $harga
 * @property string $kode_pos
 * @property string $kabupaten
 * @property string $detail_alamat
 * @property string $status 1= belum dikirim, 2=dikirim, 3=diterima, 4=gagal
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Payment|null $payment
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir query()
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereDetailAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereKabupaten($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereKodePos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereTglPengiriman($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ongkir whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ongkir extends Model
{
    protected $table = 'ongkirs';
    protected $fillable = ['transaksi_id','tgl_pengiriman','alamat', 'kode_pos', 'kabupaten', 'detail_alamat'];
    use HasFactory;

    public function payment(){
        return $this->hasOne(Payment::class, 'transaksi_id','transaksi_id');
    }
    public function user()
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RequestBarang
 *
 * @property int $id
 * @property int $user_id
 * @property string $foto_produk
 * @property string $nama_produk
 * @property int $harga
 * @property string $deskripsi
 * @property string $categories
 * @property string $Alamat
 * @property string $status 1 = Belum  dikonfirmasi, 2 = konfirmasi ,3 = ditolak
 * @property string $alasan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereAlasan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereFotoProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereNamaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBarang whereUserId($value)
 * @mixin \Eloquent
 */
class RequestBarang extends Model
{
    protected $table = "request_barangs";
    protected $fillable = [
        'user_id','nama_produk','foto_produk','harga','deskripsi','categories','Alamat', 'status','alasan', 'komisi'
    ];
    protected $hidden = ['user_id'];
    use HasFactory;

    /**
     * user
     *  Relasi Ke User;
     * @return void
     */
    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

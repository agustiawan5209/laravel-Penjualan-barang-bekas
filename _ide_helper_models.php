<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Barang
 *
 * @property int $id
 * @property int $user_id
 * @property string $foto_produk
 * @property string $nama_produk
 * @property int $harga
 * @property string $deskripsi
 * @property string|null $stock
 * @property string $categories
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Diskon|null $diskon
 * @property-read \App\Models\Promo|null $promo
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\BarangFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang query()
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereCategories($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereFotoProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereHarga($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereNamaProduk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Barang whereUserId($value)
 * @mixin \Eloquent
 */
	class Barang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $user_id
 * @property int $jumlah_barang
 * @property int $barang_id
 * @property string $sub_total
 * @property int $pemilik_id
 * @property int|null $diskon
 * @property int|null $promo
 * @property string|null $snap_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @method static \Database\Factories\CartFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereJumlahBarang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePemilikId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSnapToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSubTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @mixin \Eloquent
 */
	class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $kategory
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @property-read \App\Models\Promo|null $promo
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereKategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Chatid
 *
 * @property int $id
 * @property int $user1_id
 * @property int $user2_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ChatidFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatid newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatid newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatid query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chatid whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatid whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatid whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatid whereUser1Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chatid whereUser2Id($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PesanChat[] $pesan
 * @property-read int|null $pesan_count
 * @property-read \App\Models\User|null $user
 */
	class Chatid extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Diskon
 *
 * @property int $id
 * @property int $barang_id
 * @property int $diskon
 * @property string $tgl_mulai
 * @property string $tgl_kadaluarsa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang $barang
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereTglKadaluarsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Diskon whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Diskon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Membership
 *
 * @property int $id
 * @property int $team_id
 * @property int $user_id
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUserId($value)
 * @mixin \Eloquent
 */
	class Membership extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MetodePembayaran
 *
 * @property int $id
 * @property int $user_id
 * @property string $bank
 * @property string $no_rekening
 * @property string $pemilik
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereBank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereNoRekening($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran wherePemilik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MetodePembayaran whereUserId($value)
 * @mixin \Eloquent
 */
	class MetodePembayaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Notifikasi
 *
 * @property int $id
 * @property string $type
 * @property string $notifiable_type
 * @property int $notifiable_id
 * @property string $data
 * @property string|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notifikasi whereUpdatedAt($value)
 */
	class Notifikasi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property string $number
 * @property string $total_price
 * @property string $payment_status 1 = Belum Di Bayar, 2 = Pembayaran Berhasil , 3 = Konfirmasi
 * @property string|null $payment_type
 * @property string|null $pdf_url
 * @property string|null $transaksi_id
 * @property string $item_details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ongkir|null $ongkir
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereItemDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePdfUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @mixin \Eloquent
 * @property string $tgl_transaksi
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereTglTransaksi($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \App\Models\User|null $Admin
 * @property-read \App\Models\Chatid|null $chatid
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\User|null $user
 */
	class PesanChat extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Promo
 *
 * @property int $id
 * @property string $kode_promo
 * @property string|null $category_id
 * @property int|null $max_user
 * @property int|null $use_user
 * @property int $promo
 * @property string $tgl_mulai
 * @property string $tgl_kadaluarsa
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Barang|null $barang
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo newQuery()
 * @method static \Illuminate\Database\Query\Builder|Promo onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereKodePromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereMaxUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo wherePromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereTglKadaluarsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo whereUseUser($value)
 * @method static \Illuminate\Database\Query\Builder|Promo withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Promo withoutTrashed()
 * @mixin \Eloquent
 * @property int|null $promo_persen
 * @property int|null $promo_nominal
 * @method static \Illuminate\Database\Eloquent\Builder|Promo wherePromoNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promo wherePromoPersen($value)
 */
	class Promo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PromoUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $promo_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Promo|null $promo
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser wherePromoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereUserId($value)
 * @mixin \Eloquent
 * @property string $status 1 = terpakai, 2 = telah terpakai
 * @method static \Illuminate\Database\Eloquent\Builder|PromoUser whereStatus($value)
 */
	class PromoUser extends \Eloquent {}
}

namespace App\Models{
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
	class RequestBarang extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SlidePage
 *
 * @property int $id
 * @property string $slide
 * @property string $deskripsi
 * @property string $thumbnail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage query()
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereSlide($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SlidePage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SlidePage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Team
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property bool $personal_team
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TeamInvitation[] $teamInvitations
 * @property-read int|null $team_invitations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Database\Factories\TeamFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team wherePersonalTeam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUserId($value)
 * @mixin \Eloquent
 */
	class Team extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TeamInvitation
 *
 * @property int $id
 * @property int $team_id
 * @property string $email
 * @property string|null $role
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Team $team
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TeamInvitation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class TeamInvitation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Toko
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Barang[] $barang
 * @property-read int|null $barang_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\TokoFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Toko newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Toko newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Toko query()
 * @mixin \Eloquent
 */
	class Toko extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaksi
 *
 * @property int $id
 * @property string $ID_transaksi
 * @property string $tgl_transaksi
 * @property string $gross_amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereGrossAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereIDTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTglTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $item_details_type
 * @property int $item_details_id
 * @property int $potongan
 * @property string $total
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereItemDetailsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereItemDetailsType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi wherePotongan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTotal($value)
 * @property string $item_details
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereItemDetails($value)
 */
	class Transaksi extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string $role_id
 * @property string|null $phone_number
 * @property string|null $alamat
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Barang[] $barang
 * @property-read int|null $barang_count
 * @property-read \App\Models\Team|null $currentTeam
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $ownedTeams
 * @property-read int|null $owned_teams_count
 * @property-read \App\Models\PromoUser|null $promo_user
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Team[] $teams
 * @property-read int|null $teams_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ulasan[] $ulasan
 * @property-read int|null $ulasan_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Voucher
 *
 * @property int $id
 * @property string $kode_vocher
 * @property int $diskon
 * @property string $deskripsi
 * @property int|null $max_user
 * @property int|null $use_user
 * @property string $tgl_mulai
 * @property string $tgl_kadaluarsa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\VoucherFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereDiskon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereKodeVocher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereMaxUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereTglKadaluarsa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereTglMulai($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Voucher whereUseUser($value)
 */
	class Voucher extends \Eloquent {}
}

namespace App\Models{
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
	class ongkir extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ulasan
 *
 * @property int $id
 * @property int $barang_id
 * @property int|null $point1
 * @property int|null $point2
 * @property int|null $point3
 * @property int|null $point4
 * @property int|null $point5
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan query()
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan whereBarangId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan wherePoint5($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ulasan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ulasan extends \Eloquent {}
}


<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;
use App\Models\User;
use App\Models\Payment;

class CreateSnapTokenService extends Midtrans
{
	protected $order;
    protected $user_id;
    protected $barang_id = [];

	public function __construct($order, $user_id, $barang_id = [])
	{
		parent::__construct();
        $this->user_id = $user_id;
        $this->barang_id = $barang_id;
		$this->order = $order;
	}
    public function generateUniqueNumber()
    {
        do {
            $code = random_int(1111, 9999);
        } while (Payment::where("number", "=", $code)->first());
        return $code;
    }
	public function getSnapToken()
	{
        $user = User::find($this->user_id);
        $array = [];
        foreach($this->barang_id as $data){
            $array[] =  [
                'id' => $data->id, // primary key produk
                'price' => $data->barang->harga, // harga satuan produk
                'quantity' => $data->jumlah_barang, // kuantitas pembelian
                'name' => $data->barang->nama_produk, // nama produk
            ];
        }
        // dd($array);
		$params = [
			/**
			 * 'order_id' => id order unik yang akan digunakan sebagai "primary key" oleh Midtrans untuk
			 * 				 membedakan order satu dengan order lain. Key ini harus unik (tidak boleh ada duplikat).
			 * 'gross_amount' => merupakan total harga yang harus dibayar customer.
			 */
			'transaction_details' => [
				'order_id' => $this->generateUniqueNumber(),
				// 'gross_amount' => '201820000',
			],
			/**
			 * 'item_details' bisa diisi dengan detail item dalam order.
			 * Umumnya, data ini diambil dari tabel `order_items`.
			 */
			'item_details' => $array,
			'customer_details' => [
				// Key `customer_details` dapat diisi dengan data customer yang melakukan order.
				'first_name' => $user->name,
				'email' => $user->email,
				'phone' => '081234567890',
			]
		];

		$snapToken = Snap::getSnapToken($params);

		return $snapToken;
	}
}

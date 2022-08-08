<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Payment;
use App\Services\Midtrans\CreateSnapTokenService;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)
    {
        $snapToken = '';
        $payment = '';
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        $user_ID = Cart::select('user_id')->where('user_id', '=', Auth::user()->id)->first();
        // session()->put('ItemCart', $keranjang);
        // $dataCart = session('ItemCart');
        // dd($user_ID->user_id);
        // dd($Barang);

        // dd($keranjang);
        if ($keranjang->count() > 0) {

            $payment = Payment::latest()->first();
            $snapToken = $payment->snap_token;

            if (empty($snapToken)) {
                // Jika snap token masih NULL, buat token snap dan simpan ke database
                $midtrans = new CreateSnapTokenService($payment, $user_ID->user_id, $keranjang);
                $snapToken = $midtrans->getSnapToken();
                $payment->snap_token = $snapToken;
                $payment->save();
            }
        }
        // dd($snapToken);
        $sub_total = Cart::where('user_id', '=', Auth::user()->id)->sum('sub_total');
        return view('livewire.page.payment', [
            'keranjang' => $keranjang,
            'snapToken' => $snapToken,
            'payment' => $payment,
            'sub_total' => $sub_total
        ]);
    }
    public function generateUniqueNumber()
    {
        do {
            $code = random_int(100000, 999999);
        } while (Payment::where("number", "=", $code)->first());

        return $code;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Barang $Barang)
    {
        $snapToken = '';
        $payment = '';
        $keranjang = Cart::where('user_id', '=', Auth::user()->id)->get();
        $total_price = Cart::where('user_id', '=', Auth::user()->id)->sum('sub_total');
        $user_ID = Cart::select('user_id')->where('user_id', '=', Auth::user()->id)->first();
        $randomNumber = $this->generateUniqueNumber();
        if ($keranjang->count() > 0) {
            Payment::create([
                'number' => $randomNumber,
                'total_price' => $total_price,
                'payment_status' => 1,
            ]);
            $payment = Payment::where('number', '=', $randomNumber)->first();
            $snapToken = $payment->snap_token;

            if (empty($snapToken)) {
                // Jika snap token masih NULL, buat token snap dan simpan ke database
                $midtrans = new CreateSnapTokenService($payment, $user_ID->user_id, $keranjang);
                $snapToken = $midtrans->getSnapToken();
                $payment->snap_token = $snapToken;
                $payment->save();
            }
        }
        // dd($snapToken);
        $sub_total = Cart::where('user_id', '=', Auth::user()->id)->sum('sub_total');
        return view('livewire.page.payment', [
            'keranjang' => $keranjang,
            'snapToken' => $snapToken,
            'payment' => $payment,
            'sub_total' => $sub_total
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        // $snapToken = $payment->snap_token;
        // if (empty($snapToken)) {
        //     // Jika snap token masih NULL, buat token snap dan simpan ke database

        //     // $midtrans = new CreateSnapTokenService($payment);
        //     $snapToken = $midtrans->getSnapToken();

        //     $payment->snap_token = $snapToken;
        //     $payment->save();
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart, Request $request)
    {
        $data =  Cart::where('id', $request->Cart)->delete();
        // $data->delete();
        return redirect()->back();
    }
}

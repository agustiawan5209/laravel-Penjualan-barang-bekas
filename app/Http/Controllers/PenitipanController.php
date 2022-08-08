<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Models\Barang;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Penitipan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PenitipanController extends Controller
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
    public function index()
    {
        $toko = Toko::where('user_id', '=', Auth::user()->id)->get();
        $keranjang_cek = Cart::where('user_id', '=', Auth::user()->id)->get();
        return view('page.jual_titip', [
            'kategory' => Category::all(),
            'Barang' => Barang::where('user_id', '=', Auth::user()->id)->get(),
            'cek_toko' => $toko,
            'jumlah_keranjang' => $keranjang_cek->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.penitipan.form', [
            'kategory' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'foto' => 'image|max:2040',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_produk' => 'required',
            'jumlah_stock' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('Jual-Titip/create')
                ->withErrors($validator)
                ->withInput();
        }
        $filename = $request->foto->getClientOriginalName();
        $explode = explode('.', $filename);
        $randomize = md5($filename) . '.' . $explode[1];
        // dd($randomize);
        $request->foto->storeAs('upload', $randomize);
        $penitipan = Barang::create([
            'user_id' => Auth::user()->id,
            'foto_produk' => $randomize,
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga_produk,
            'stock' => $request->jumlah_stock,
            'deskripsi' => $request->deskripsi_produk,
            'categories' => $request->kategori_produk,
        ]);
        return redirect('Jual-Titip')->with('message', $penitipan ? 'Berhasil Di Tambah' : 'Gagal Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $barang = Barang::find($id);
        $foto_produk = $barang->foto_produk;
        return view('page.penitipan.edit', [
            'kategory' => Category::all(),
            'foto_produk' => $barang->foto_produk,
            'nama_produk' => $barang->nama_produk,
            'harga' => $barang->harga,
            'deskripsi' => $barang->deskripsi,
            'stock' => $barang->stock,
            'kategori' => $barang->category->kategory,
            'itemID' => $barang->id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            // 'foto' => 'image|max:2040',
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'deskripsi_produk' => 'required',
            'kategori_produk' => 'required',
            'jumlah_stock' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('Jual-Titip/create')
                ->withErrors($validator)
                ->withInput();
        }
        if ($request->foto != null) {
            // dd($request->foto);
            $filename = $request->foto->getClientOriginalName();
            $explode = explode('.', $filename);
            $randomize = md5($filename) . '.' . $explode[1];
            $request->foto->storeAs('upload', $randomize);

        }else{
            $penitipan = Barang::where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->update([
                'nama_produk' => $request->nama_produk,
                'harga' => $request->harga_produk,
                'stock' => $request->jumlah_stock,
                'deskripsi' => $request->deskripsi_produk,
                'categories' => $request->kategori_produk,
            ]);
        }
        // dd($randomize);

        return redirect('Jual-Titip')->with('message', $penitipan ? 'Berhasil Di Update' : 'Gagal Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $penitipan = Barang::where('user_id', '=', Auth::user()->id)->where('id', '=', $id)->delete();
        return redirect('Jual-Titip')->with('message', $penitipan ? 'Berhasil Di Hapus' : 'Gagal Di Hapus');
    }
}

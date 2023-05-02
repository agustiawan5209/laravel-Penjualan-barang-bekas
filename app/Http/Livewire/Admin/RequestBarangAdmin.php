<?php

namespace App\Http\Livewire\Admin;

use Exception;
use App\Models\Chatid;
use Livewire\Component;
use App\Models\PesanChat;
use App\Models\RequestBarang;
use Illuminate\Support\Facades\Auth;

class RequestBarangAdmin extends Component
{
    public $row = 10, $search = '', $alasan, $status;
    public $foto_produk, $updatefoto, $nama_produk, $Alamat, $deskripsi, $categories, $harga, $itemID, $komisi;
    public $statusItem = false;

    // Chat
    public $id_chat, $id_pesan, $barang_request, $pesan, $chatItem = false;
    public $id_pemilik, $nama_chat, $text_chat, $message, $request_id;

    public function render()
    {
        $request = RequestBarang::paginate($this->row);
        if ($this->search != null) {
            $request = RequestBarang::where('nama_produk', 'like', '%' . $this->search . '%')
                ->paginate($this->row);
        }
        return view('livewire.admin.request-barang-admin', [
            'barang' => $request,
        ]);
    }
    public function konfirModal($id)
    {
        $barang = RequestBarang::find($id);
        $this->itemID = $barang->id;
        $this->nama_produk = $barang->nama_produk;
        $this->foto_produk = $barang->foto_produk;
        $this->deskripsi = $barang->deskripsi;
        $this->harga = $barang->harga;
        $this->Alamat = $barang->Alamat;
        $this->categories = $barang->categories;
        $this->statusItem = true;
    }
    public function konfirmasiStatus($id, $status)
    {
        // dd($status);
        $this->validate([
            'komisi'=> 'numeric|nullable'
        ]);
        $msg = '';
        if ($status == 2) {
            $msg = "Berhasil Di konfirmasi";
        } else if ($status == 3) {
            $msg = "Request Barang Berhasil Di Tolak";
        }
        // $request->
        session()->flash('message', $msg);
        $request = RequestBarang::find($id)->update([
            'status' => $status,
            'alasan' => $this->alasan,
            'komisi'=> $this->komisi,
        ]);
        $this->statusItem = false;
    }
    public function chatUser($id_request)
    {
        $this->request_id = $id_request;
        $barang = RequestBarang::find($id_request);
        $chat_id = Chatid::where('user2_id', $barang->user_id)->first();
        $this->pesan = PesanChat::where('chat_id', '=', $chat_id->id)->get();

        $text = '<ul>
        <li>Produk = '. $barang->nama_produk .' </li>
        <li>Harga ='. $barang->harga .' </li>
        <li>Kategori = '. $barang->kategori .'</li>
        <li>Deksripsi = '. $barang->deskripsi .'</li>
            </ul>';
        $this->message = $text;
        session()->put('textRequest', $text);
        return redirect()->route('chat-single', ['id_chat' => $chat_id->id]);
    }
    public function loadmessage()
    {
        $this->validate([
            'message' => 'required',
        ]);
        PesanChat::create([
            'chat_id' => $this->id_chat,
            'from' => Auth::user()->id,
            'to' => $this->id_pemilik,
            'body' => $this->message,
        ]);
        $this->chatUser($this->request_id);
        $this->message = '';
    }
}

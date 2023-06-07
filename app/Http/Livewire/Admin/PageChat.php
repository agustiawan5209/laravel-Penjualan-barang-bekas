<?php

namespace App\Http\Livewire\Admin;

use App\Models\Chatid;
use App\Models\PesanChat;
use Auth;
use Livewire\Component;

class PageChat extends Component
{
    public $pesan;
    public $message;
    public $id_pemilik;
    public $id_chat;
    public $nama_chat;
    public $openChat;
    public function render()
    {
        $chat_id = Chatid::all();

        // get Image
        // foreach($chat_id as $item){
        //     $image = $item->user->profile_photo;
        //     $name =
        // }

        // dd($image);
        // foreach()
        return view('livewire.admin.page-chat',[
            'chat_id'=> $chat_id,
            // 'image'=> $image,
        ]);
    }
    public function selectChat($id){
        $this->pesan = PesanChat::where('chat_id', '=', $id)->get();
        // dd($this->pesan);
        if($this->pesan->count() > 0){
            foreach ($this->pesan as $item ) {
                $this->id_pemilik = $item->from;
                $this->id_chat = $item->chat_id;
                $this->nama_chat = $item->user->name;
            }
            // dd($this->nama_chat);
        }else{
            $chatID = Chatid::find($id);
            $this->id_pemilik = $chatID->user2_id;
            $this->id_chat = $chatID->id;
            $this->nama_chat = $chatID->user->name;
            // dd($chatID);
        }
    }
    public function loadmessage(){
        $this->validate([
            'message'=>'required',
        ]);
        PesanChat::create([
            'chat_id' => $this->id_chat,
            'from'=> Auth::user()->id,
            'to'=> $this->id_pemilik,
            'body'=> $this->message,
        ]);
        $this->selectChat($this->id_chat);
        $this->message = '';
    }
    public function OpenChatModal(){
        if($this->openChat == false){
            $this->openChat = true;
        }
        if($this->openChat == true){
            $this->openChat = false;
        }

    }
}

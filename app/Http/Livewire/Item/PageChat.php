<?php

namespace App\Http\Livewire\Item;

use App\Events\MessageNotification;
use Auth;
use App\Models\User;
use App\Models\Chatid;
use App\Models\PesanChat;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class PageChat extends Component
{
    public $chat_id, $from, $to, $body;
    public function cek_user()
    {
        if (Auth::check()) {
            $chatID = Chatid::where('user2_id', '=', Auth::user()->id)->get();
            if ($chatID->count() > 0) {
                foreach ($chatID as  $item) {
                    return $item->user2_id;
                }
            } else {
                $user = User::where('role_id', '=', 'SuperAdmin')->first();
                $user =  Chatid::create([
                    'user1_id' => $user->id,
                    'user2_id' => Auth::user()->id,
                ]);
                return $user->user2_id;
            }
        } else {
            $chatID = '01234567891011223344556677889900_abcdefghijklmnopqrstuvwxyz_ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            session()->put('user_id', substr(str_shuffle($chatID), 0, 4));

            return session('user_id');
        }
    }
    public function render()
    {
        $this->cek_user();
        if (Auth::check()) {
            $chat_id = Chatid::where('user1_id', '1')->where('user2_id', Auth::user()->id)->first();
            $pesan = PesanChat::where('chat_id', $chat_id->id)->get();
        }
        return view('livewire.item.page-chat', [
            'user1_id' => 'Admin',
            'user2_id' =>  $this->cek_user(),
            'pesan' => $pesan,
        ]);
    }

    public function sendNotif($from, $to, $body, $pesan)
    {
        $enrolData = [
            'body' => $body,
            'type' => 'chat',
            'from' => $from,
        ];
        $pesan = PesanChat::latest()->first();
        $pesan->notify(new InvoicePaid($enrolData));
    }
    public function load()
    {
        $this->validate([
            'body' => "required",
        ]);
        $user2_name = User::where('id', '=', $this->cek_user())->first();
        $user = $user2_name;
        $admin = User::where('role_id', '=', 'SuperAdmin')->first();
        $this->from = $user;
        $this->to = $admin->id;
        $this->body;
        // Cari Data ChatID Dengan Berdasar User Dan Admin
        $chatID = Chatid::where('user1_id', '1')->where('user2_id', Auth::user()->id)->get();
        foreach ($chatID as $item) {
            $pesan = PesanChat::create([
                "chat_id" => $item->id,
                'from' => $this->from,
                'to' => $this->to,
                'body' => $this->body
            ]);
        }
        $this->sendNotif($this->from, $this->to, $this->body, $pesan);
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\PesanChat;
use App\Notifications\InvoicePaid;
use Auth;

class Dashboard extends Component
{
    public function render()
    {
        // $this->notify();
        return view('livewire.admin.dashboard', [
            'pesan' => PesanChat::latest()->first(),
            'user' => User::latest()->first(),
        ]);
    }
    public function notify()
    {
        if (Auth::check()) {
            $user = User::latest()->first();
            auth()->user()->notify(new InvoicePaid($user));
        }
    }
}

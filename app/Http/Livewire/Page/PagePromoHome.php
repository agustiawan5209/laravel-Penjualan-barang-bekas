<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;

class PagePromoHome extends Component
{
    public function render()
    {
        return view('livewire.page.page-promo-home')->layout('layouts.guest');
    }
}

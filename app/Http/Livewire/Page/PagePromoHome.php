<?php

namespace App\Http\Livewire\Page;

use App\Models\Promo;
use Livewire\Component;

class PagePromoHome extends Component
{
    public function render()
    {
        $promo = Promo::all();

        return view('livewire.page.page-promo-home', compact('promo'))->layout('layouts.guest');
    }
}

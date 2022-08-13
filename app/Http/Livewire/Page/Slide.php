<?php

namespace App\Http\Livewire\Page;

use Livewire\Component;
use App\Models\SlidePage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Slide extends Component
{

    public function render()
    {
        $slide = SlidePage::all();
        return view('livewire.page.slide',[
            'slide'=> $slide,
        ]);
    }

}

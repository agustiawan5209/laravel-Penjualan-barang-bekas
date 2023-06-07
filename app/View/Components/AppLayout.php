<?php

namespace App\View\Components;

use App\Models\RequestBarang;
use Illuminate\View\Component;

class AppLayout extends Component
{
    // public $page;
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */

    //  public function __construct($page)
    //  {
    //     $this->page = $page;
    //  }
    public function render()
    {
        return view('layouts.app');
    }
}

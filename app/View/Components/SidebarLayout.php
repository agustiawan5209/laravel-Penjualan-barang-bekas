<?php

namespace App\View\Components;

use App\Models\RequestBarang;
use Illuminate\View\Component;

class SidebarLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $data = [];
        if (auth()->user()->role_id == "SuperAdmin") {
            $data['request'] = RequestBarang::where('status', '=', '1')->count();
        }
        return view('components.sidebar-layout',[
            'data'=> $data,
        ]);
    }
}

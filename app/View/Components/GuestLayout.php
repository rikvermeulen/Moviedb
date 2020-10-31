<?php

namespace App\View\Components;

use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    /*public function render()
    {
        return view('layout');
    }*/

    public function render()
    {
        return view('guest')
            ->extends('layout')
            ->section('content');
    }
}

<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BlogPost extends Component
{
    public $blog;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.blog-post');
    }
}

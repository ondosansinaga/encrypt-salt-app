<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */
    public string $id;
    public string $title;
    public string $size;
    // public string $action;
    public string $route;
    public function __construct($id, $title, $size = 'md', $route = '')
    {
        $this->id = $id;
        $this->title = $title;
        $this->size = $size;
        // $this->action = $action;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
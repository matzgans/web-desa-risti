<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PdfHeader extends Component
{
    // public $title;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('pdf.layouts.header');
    }
}

<?php

namespace App\View\Components;

use App\Models\Exercises;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableEdit extends Component
{
    public $exercises;
    /**
     * Create a new component instance.
     */
    public function __construct($exercises = null)
    {
        //
      $this->exercises = $exercises = Exercises::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-edit');
    }
}

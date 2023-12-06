<?php

namespace App\Http\Livewire\Components\Layout;

use Livewire\Component;

class ComponentSearchBar extends Component
{
    public $search;
    
    public function render()
    {
        return view('livewire.components.layout.component-search-bar');
    }
}

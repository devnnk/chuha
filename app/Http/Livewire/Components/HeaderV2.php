<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class HeaderV2 extends Component
{

    public function render()
    {
        $categories = Category::where('status', 'open')->get();
        return view('livewire.components.header-v2', compact('categories'));
    }

}

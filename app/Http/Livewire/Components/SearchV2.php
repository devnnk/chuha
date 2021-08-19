<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class SearchV2 extends Component
{
    public $search;
    public $is_first = true;

    public function render()
    {
        $categories = Category::where('status', 'open')->get();
        return view('livewire.components.search-v2', [
            'categories' => $categories,
            'is_first' => $this->is_first
        ]);
    }

    public function isFirst()
    {
        $this->is_first = false;
    }
}

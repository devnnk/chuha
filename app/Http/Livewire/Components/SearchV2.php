<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use App\Models\Item;
use Livewire\Component;

class SearchV2 extends Component
{
    public $search;
    public $is_first = true;

    public function render()
    {
        $search = $this->search;
        $items = Item::where('status', 'open')->where('title', 'LIKE', "%$search%")->limit(10)->get();
        return view('livewire.components.search-v2', [
            'is_first' => $this->is_first,
            'items' => $items
        ]);
    }

    public function isFirst()
    {
        $this->is_first = false;
    }
}

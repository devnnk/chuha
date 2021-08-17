<?php

namespace App\Http\Livewire\V2;

use App\Models\Category;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemLivewire extends Component
{
    use WithPagination;

    public $code = "";

    public function mount($item)
    {
        if (!isset($item)) abort(404);
        $this->code = $item;
    }

    public function render()
    {
        $item = Item::where('status', 'open')->where('code', $this->code)->firstorfail();
        return view('livewire.v2.item', [
            'item' => $item,
        ])->layout('layouts.app-v2');
    }
}

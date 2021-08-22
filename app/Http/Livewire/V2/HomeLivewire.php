<?php

namespace App\Http\Livewire\V2;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class HomeLivewire extends Component
{
    use WithPagination;

    public function render()
    {
        $categories = Category::where('status', 'open')->get();
        $banners = Banner::where('status', 'open')->orderby('position', 'DESC')->get();
        $items = Item::where('status', 'open')->paginate();
        return view('livewire.v2.home', [
            'categories' => $categories,
            'items' => $items,
            'banners' => $banners,
        ])->layout('layouts.app-v2');
    }
}

<?php

namespace App\Http\Livewire\Components;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Livewire\Component;

class SearchV2 extends Component
{
    public $search;
    public $is_first = true;

    public function render()
    {
        $categories = Category::where('status', 'open')->get();
        $list_categories = $categories->pluck('id')->toarray();
        $list_products = Product::where('status', 'open')->wherein('category_id', $list_categories)->pluck('id')->toarray();
        $search = $this->search;
        $items = Item::where('status', 'open')->where('title', 'LIKE', "%$search%")
            ->wherein('product_id', $list_products)
            ->orderby('id', 'DESC')->limit(10)->get();
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

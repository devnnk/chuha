<?php

namespace App\Http\Livewire\V2;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class HomeLivewire extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
//
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $categories = Category::where('status', 'open')->get();
        $list_categories = $categories->pluck('id')->toarray();
        $list_products = Product::where('status', 'open')->wherein('category_id', $list_categories)->pluck('id')->toarray();
        $banners = Banner::where('status', 'open')->orderby('position', 'DESC')->get();
        $items = Item::where('status', 'open')->wherein('product_id', $list_products)->orderby('id', 'DESC')->paginate(12);
        return view('livewire.v2.home', [
            'items' => $items,
            'banners' => $banners,
        ])->layout('layouts.app-v2');
    }
}

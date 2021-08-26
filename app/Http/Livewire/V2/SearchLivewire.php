<?php

namespace App\Http\Livewire\V2;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class SearchLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $code = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render(Request $request)
    {
        $search = $request->search;
        if (!$search) abort(404);
        $categories = Category::where('status', 'open')->get();
        $list_categories = $categories->pluck('id')->toarray();
        $list_products = Product::where('status', 'open')->wherein('category_id', $list_categories)->pluck('id')->toarray();
        $items = Item::where('status', 'open')->where('title', 'LIKE', "%{$search}%")
            ->wherein('product_id', $list_products)
            ->orderby('id', 'DESC')->paginate(12);
        return view('livewire.v2.search', [
            'items' => $items,
            'search' => $search,
        ])->layout('layouts.app-v2');
    }
}

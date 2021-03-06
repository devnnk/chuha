<?php

namespace App\Http\Livewire\V2;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductLivewire extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public $code = "";

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount($code)
    {
        if (!isset($code)) abort(404);
        $this->code = $code;
    }

    public function render()
    {
        $product = Product::where('status', 'open')->where('code', $this->code)->firstorfail();
        $category = Category::where('status', 'open')->findorfail($product->category_id);
        $items = Item::where('status', 'open')->where('product_id', $product->id)
            ->orderby('id', 'DESC')->paginate(12);
        return view('livewire.v2.product', [
            'category' => $category,
            'product' => $product,
            'items' => $items,
        ])->layout('layouts.app-v2');
    }
}

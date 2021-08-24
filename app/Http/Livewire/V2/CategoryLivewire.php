<?php

namespace App\Http\Livewire\V2;

use App\Models\Category;
use App\Models\Item;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryLivewire extends Component
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
        $category = Category::where('status', 'open')->where('code', $this->code)->firstorfail();
        $products = Product::where('status', 'open')->where('category_id', $category->id)->get();
        return view('livewire.v2.category', [
            'category' => $category,
            'products' => $products
        ])->layout('layouts.app-v2');
    }
}

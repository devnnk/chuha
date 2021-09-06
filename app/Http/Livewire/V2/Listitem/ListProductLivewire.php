<?php

namespace App\Http\Livewire\V2\Listitem;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ListProductLivewire extends Component
{
    public function render()
    {
        $list_category = Category::wherestatus('open')->pluck('id')->toarray();
        $product1s = Product::where('status', 'open')
            ->wherein('category_id', $list_category)
            ->wherenotnull('banner')
            ->orderby('position', 'DESC')
            ->limit(3)
            ->get();

        $product2s = Product::where('status', 'open')
            ->wherenotin('id', $product1s->pluck('id')->toarray())
            ->wherein('category_id', $list_category)
            ->wherenotnull('banner')
            ->orderby('position', 'DESC')
            ->limit(2)
            ->get();
        return view('livewire.v2.listitem.list-product', [
            'product1s' => $product1s,
            'product2s' => $product2s,
        ]);
    }
}

<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class BannertLivewire extends Component
{
    use Modal;

    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.banner.index', [
            'products' => $products
        ]);
    }

    public function updateStatus($id)
    {
        $category = Product::find($id);
        if (!$category) return redirect(Request::url());
        $status = $category->status === 'close' ? 'open' : 'close';
        $category->update(['status' => $status]);
    }
}

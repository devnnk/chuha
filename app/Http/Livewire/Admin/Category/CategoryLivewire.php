<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class CategoryLivewire extends Component
{
    use Modal;

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.category.index', [
            'categories' => $categories
        ]);
    }

    public function updateStatus($id)
    {
        $category = Category::find($id);
        if (!$category) return redirect(Request::url());
        $status = $category->status === 'close' ? 'open' : 'close';
        $category->update(['status' => $status]);
    }
}

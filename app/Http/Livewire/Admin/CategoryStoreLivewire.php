<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class CategoryStoreLivewire extends Component
{
    public $category = '';

    public function mount($id)
    {
        if (isset($id) && $id) {
            $this->category = Category::find($id);
            if (!$this->category) abort(404);
        }
    }

    public function render()
    {
        return view('livewire.admin.category.store', [
            'category' => $this->category
        ]);
    }
}

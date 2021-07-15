<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryStoreLivewire extends Component
{
    public $category = '';
    public $name = '';

    public function mount($id)
    {
        if (isset($id) && $id) {
            $this->category = Category::find($id);
            if (!$this->category) abort(404);

            $this->name = $this->category->name;
        }
    }

    public function render()
    {
        return view('livewire.admin.category.store', [
            'category' => $this->category
        ]);
    }
}

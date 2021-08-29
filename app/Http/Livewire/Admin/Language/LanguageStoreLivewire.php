<?php

namespace App\Http\Livewire\Admin\Language;

use App\Models\Category;
use App\Models\Item;
use App\Models\Language;
use App\Models\Product;
use Livewire\Component;

class LanguageStoreLivewire extends Component
{
    public $language = '';

    public function mount($id)
    {
        if (isset($id) && $id) {
            $this->language = Language::find($id);
            if (!$this->language) abort(404);
        }
    }

    public function render()
    {
        return view('livewire.admin.language.store', [
            'language' => $this->language
        ]);
    }
}

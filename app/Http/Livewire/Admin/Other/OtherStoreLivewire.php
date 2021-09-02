<?php

namespace App\Http\Livewire\Admin\Other;

use App\Models\Category;
use App\Models\Item;
use App\Models\Language;
use App\Models\Other;
use App\Models\Product;
use Livewire\Component;

class OtherStoreLivewire extends Component
{
    public $other = '';

    public function mount($id)
    {
        if (isset($id) && $id) {
            $this->other = Other::find($id);
            if (!$this->other) abort(404);
        }
    }

    public function render()
    {
        return view('livewire.admin.other.store', [
            'other' => $this->other
        ]);
    }
}

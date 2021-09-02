<?php

namespace App\Http\Livewire\V2;

use App\Models\Category;
use App\Models\Item;
use App\Models\Other;
use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;

class ContactUsLivewire extends Component
{

    public function render(Request $request)
    {
        $others = Other::where('type', 'contact-us')->orderby('id', 'DESC')->get();
        return view('livewire.v2.contact-us', [
            'others' => $others
        ])->layout('layouts.app-v2');
    }
}

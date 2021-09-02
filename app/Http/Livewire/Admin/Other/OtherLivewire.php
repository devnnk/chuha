<?php

namespace App\Http\Livewire\Admin\Other;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Item;
use App\Models\Language;
use App\Models\Other;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class OtherLivewire extends Component
{
    use Modal;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $search = $this->search;
        $others = Other::orderby('id', 'desc')->get();
        return view('livewire.admin.other.index', [
            'others' => $others
        ]);
    }
}

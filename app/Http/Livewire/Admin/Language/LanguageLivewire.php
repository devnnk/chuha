<?php

namespace App\Http\Livewire\Admin\Language;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Item;
use App\Models\Language;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class LanguageLivewire extends Component
{
    use Modal;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        $search = $this->search;
        $languages = Language::when($search, function ($q) use ($search) {
            $q->orwhere('str_to', 'like', '%' . $this->search . '%')->orwhere('str_from', 'like', '%' . $this->search . '%');
        })->orderby('id', 'desc')->paginate(10);
        return view('livewire.admin.language.index', [
            'languages' => $languages
        ]);
    }
}

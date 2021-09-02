<?php

namespace App\Http\Livewire\Components;

use App\Models\Other;
use Livewire\Component;

class FooterV2 extends Component
{
    public function render()
    {
        $others = Other::where('type', 'footer')->get();
        return view('livewire.components.footer-v2', [
            'others' => $others,
        ]);
    }
}

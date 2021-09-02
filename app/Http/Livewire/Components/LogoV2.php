<?php

namespace App\Http\Livewire\Components;

use App\Models\Other;
use Livewire\Component;

class LogoV2 extends Component
{
    public function render()
    {
        $other = Other::where('type', 'logo')->orderby('id', 'DESC')->first();

        return view('livewire.components.logo-v2', [
            'other' => $other,
        ]);
    }
}

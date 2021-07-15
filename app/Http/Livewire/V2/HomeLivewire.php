<?php

namespace App\Http\Livewire\V2;

use Livewire\Component;

class HomeLivewire extends Component
{
    public function render()
    {
        return view('livewire.v2.home')
            ->layout('layouts.app-v2');
    }
}

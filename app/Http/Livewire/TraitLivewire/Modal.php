<?php

namespace App\Http\Livewire\TraitLivewire;

trait Modal
{
    public function modalDelete($code, $action)
    {
        $this->emit('showModal', ['content' => $code, 'action' => $action]);
    }
}

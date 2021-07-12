<?php

namespace App\Http\Livewire\Components;

use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteModal extends Component
{
    public $is_modal = false;
    public $content = '';
    public $action = '';

    protected $listeners = ['showModal' => 'show'];

    public function render()
    {
        return view('livewire.components.delete-modal');
    }

    public function show($data)
    {
        $this->content = $data['content'];
        $this->action = $data['action'];
        $this->is_modal = true;
    }

    public function stopConfirming()
    {
        $this->is_modal = false;
    }
}

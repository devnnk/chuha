<?php

namespace App\Http\Livewire\Admin\Item;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Item;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ItemLivewire extends Component
{
    use Modal;

    public function render()
    {
        $items = Item::paginate(10);
        return view('livewire.admin.item.index', [
            'items' => $items
        ]);
    }

    public function updateStatus($id)
    {
        $item = Item::find($id);
        if (!$item) return redirect(Request::url());
        $status = $item->status === 'close' ? 'open' : 'close';
        $item->update(['status' => $status]);
    }
}

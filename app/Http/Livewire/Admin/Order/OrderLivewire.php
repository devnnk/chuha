<?php

namespace App\Http\Livewire\Admin\Order;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Order;
use Livewire\Component;

class OrderLivewire extends Component
{
    use Modal;

    public $search;
    public $status;

    protected $queryString = ['search'];

    public function render()
    {
        $search = $this->search;
        $orders = Order::when($search, function ($q) use ($search) {
            $q->orwhere('order_id', 'like', '%' . $this->search . '%')
                ->orwhere('name', 'like', '%' . $this->search . '%')
                ->orwhere('created_at', 'like', '%' . $this->search . '%');
        })->when($search, function ($q) use ($search) {
            $q->orwhere('order_id', 'like', '%' . $this->search . '%')
                ->orwhere('name', 'like', '%' . $this->search . '%')
                ->orwhere('created_at', 'like', '%' . $this->search . '%');
        })->orderby('id', 'desc')->paginate(10);
        return view('livewire.admin.order.index', [
            'orders' => $orders
        ]);
    }

    public function changeStatus($id, $value)
    {
        $order = Order::find($id);
        if (!$order || !in_array($this->status, Order::LIST_STATUS)) return redirect(request()->header('Referer'));
dd($value);
//        $order->update([
//            'status' => $this->status
//        ]);
    }
}

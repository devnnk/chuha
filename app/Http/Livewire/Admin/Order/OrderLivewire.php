<?php

namespace App\Http\Livewire\Admin\Order;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Order;
use Livewire\Component;

class OrderLivewire extends Component
{
    use Modal;

    public $search;
    public $update_status;
    public $filter_status = "";

    protected $queryString = ['search'];

    public function render()
    {
        $search = $this->search;
        $filter_status = $this->filter_status;
        $orders = Order::when($search, function ($q) use ($search) {
            $q->orwhere('order_id', 'like', '%' . $this->search . '%')
                ->orwhere('name', 'like', '%' . $this->search . '%')
                ->orwhere('email', 'like', '%' . $this->search . '%')
                ->orwhere('created_at', 'like', '%' . $this->search . '%');
        })->when($filter_status, function ($q) use ($filter_status) {
            $q->where('status', $filter_status);
        })->orderby('id', 'desc')->paginate(10);
        return view('livewire.admin.order.index', [
            'orders' => $orders
        ]);
    }

    public function changeStatus($id)
    {
        $order = Order::find($id);
        if (!$order || !in_array($this->update_status, Order::LIST_STATUS)) return redirect(request()->header('Referer'));
        $order->update([
            'status' => $this->update_status
        ]);
    }

    public function selectStatusFiller($filter_status) {
        $this->filter_status = $filter_status;
        $this->render();
    }
}

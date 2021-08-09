<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index()
    {
        return view('admin.item.index');
    }

    public function create()
    {
        $product_count = Product::count();
        if (!$product_count) return redirect()->route('admin.item.index')->with('notify', ['message' => 'You need add product', 'type' => 'warning']);
        return view('admin.item.store');
    }

    public function store(Request $request)
    {
        $data = $request->only('sku', 'title', 'content', 'info', 'recommendation', 'images', 'product_id', 'status');
        $data_price = $request->only('pick_number_set_price', 'type', 'price', 'amount');

        $item = Item::create($data);

        $pick_number_set_price = (int)$data_price['pick_number_set_price'];

        foreach ($data_price['type'] as $key => $type) {
            if ($key >= $pick_number_set_price) break;
            Price::create([
                'type' => $type,
                'price' => (float)($data_price['price'][$key] ?? 0),
                'amount' => (int)($data_price['amount'][$key] ?? 0),
                'item_id' => $item->id
            ]);
        }

        return back()->with('notify', ['message' => isset($data['id']) && $data['id'] ? 'Update success.' : 'Create success!', 'type' => 'success']);
    }

    public function edit($id)
    {
        return view('admin.item.store', compact('id'));
    }

    public function destroy($id)
    {
        Category::findorfail($id)->delete();
        return back()->with('notify', ['message' => 'Deleted']);
    }
}

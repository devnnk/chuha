<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        if (!$product_count) return redirect()->route('admin.item.index');
        return view('admin.item.store');
    }

    public function store(Request $request)
    {
        $data = $request->only('name', 'sku', 'title', 'content', 'info', 'recommendation', 'images', 'product_id', 'status');
        $data_price = $request->only('pick_number_set_price', 'type', 'price', 'amount');

        $pick_number_set_price = (int)$data_price['pick_number_set_price'];

        $data_price_final = [];
        foreach ($data_price['type'] as $key => $type) {
            if ($key >= $pick_number_set_price) break;
            $data_price_final[] = [
                'type' => $type,
                'price' => $data_price['price'],
                'amount' => $data_price['amount'],
            ];
        }

dd($data, $data_price);
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

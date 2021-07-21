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
        $id = $request->id;
        if ($id) {
            $product = Product::findorfail($id);
            $product->update([
                'name' => $request->name,
                'banner' => $request->banner,
                'position' => (int)$request->position,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'code' => $product->code
            ]);
        } else {
            Product::create([
                'name' => $request->name,
                'banner' => $request->banner,
                'position' => (int)$request->position,
                'status' => $request->status,
                'category_id' => $request->category_id
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

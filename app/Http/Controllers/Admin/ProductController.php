<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        return view('admin.product.index');
    }

    public function create()
    {
        $category_count = Category::count();
        if (!$category_count) return redirect()->route('admin.category.index')->with('notify', ['message' => 'You need add category', 'type' => 'warning']);
        return view('admin.product.store');
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
                'sku' => $request->sku,
                'code' => $product->code
            ]);
        } else {
            Product::create([
                'name' => $request->name,
                'banner' => $request->banner,
                'position' => (int)$request->position,
                'status' => $request->status,
                'category_id' => $request->category_id,
                'sku' => $request->sku
            ]);
        }

        return back()->with('notify', ['message' => isset($data['id']) && $data['id'] ? 'Update success.' : 'Create success!', 'type' => 'success']);
    }

    public function edit($id)
    {
        return view('admin.product.store', compact('id'));
    }

    public function destroy($id)
    {
        Category::findorfail($id)->delete();
        return back()->with('notify', ['message' => 'Deleted', 'type' => 'success']);
    }
}

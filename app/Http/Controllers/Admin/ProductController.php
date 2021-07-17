<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
        return view('admin.product.store');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $category = Category::findorfail($id);
            $category->update([
                'name' => $request->name,
                'banner' => $request->banner,
                'code' => $category->code
            ]);
        } else {
            Category::create([
                'name' => $request->name,
                'banner' => $request->banner
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
        return back()->with('notify', ['message' => 'Deleted']);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('admin.category.index');
    }

    public function create()
    {
        return view('admin.category.store');
    }

    public function store(Request $request)
    {
        $id = $request->id;
        if ($id) {
            $category = Category::findorfail($id);
            $category->update([
                'name' => $request->name,
                'banner' => $request->banner,
                'position' => (int)$request->position,
                'status' => $request->status,
                'code' => $category->code
            ]);
        } else {
            Category::create([
                'name' => $request->name,
                'banner' => $request->banner,
                'position' => (int)$request->position,
                'status' => $request->status,
            ]);
        }

        return back()->with('notify', ['message' => isset($data['id']) && $data['id'] ? 'Update success.' : 'Create success!', 'type' => 'success']);
    }

    public function edit($id)
    {
        return view('admin.category.store', compact('id'));
    }

    public function destroy($id)
    {
        Category::findorfail($id)->delete();
        return back()->with('notify', ['message' => 'Deleted']);
    }
}

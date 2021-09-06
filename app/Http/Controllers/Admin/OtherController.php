<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Other;
use App\Models\Product;
use Illuminate\Http\Request;

class OtherController extends Controller
{
    //
    public function index()
    {
        return view('admin.other.index');
    }

    public function create()
    {
        return view('admin.other.store');
    }

    public function store(Request $request)
    {
        $data = $request->only('content', 'type');
        if (in_array($data['type'], ['logo', 'title'])) {
            $data['content'] = strip_tags($data['content']);
        }

        $id = $request->id;
        if ($id) {
            $other = Other::findorfail($id);
            $other->update($data);
        } else {
            Other::create($data);
        }

        return back()->with('notify', ['message' => isset($data['id']) && $data['id'] ? 'Update success.' : 'Create success!', 'type' => 'success']);
    }

    public function edit($id)
    {
        return view('admin.other.store', compact('id'));
    }

    public function destroy($id)
    {
        Other::findorfail($id)->delete();
        return back()->with('notify', ['message' => 'Deleted', 'type' => 'success']);
    }
}

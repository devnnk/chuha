<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    //
    public function index()
    {
        return view('admin.banner.index');
    }

    public function create()
    {
        return view('admin.banner.store');
    }

    public function store(Request $request)
    {
        $data = $request->only('name', 'url', 'position', 'status', 'image');
        $banner = Banner::find($request->id);
        if ($banner) {
            $banner->update($data);
        } else {
            Banner::create($data);
        }

        return back()->with('notify', ['message' => isset($request->id) && $request->id ? 'Update success.' : 'Create success!', 'type' => 'success']);
    }

    public function edit($id)
    {
        return view('admin.banner.store', compact('id'));
    }

    public function destroy($id)
    {
        Banner::findorfail($id)->delete();
        return back()->with('notify', ['message' => 'Deleted', 'type' => 'success']);
    }
}

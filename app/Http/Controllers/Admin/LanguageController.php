<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Language;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LanguageController extends Controller
{
    //
    public function index()
    {
        return view('admin.language.index');
    }

    public function create()
    {
        return view('admin.language.store');
    }

    public function store(Request $request)
    {
        $data = $request->only('str_from', 'str_to', 'type');
        $data['code'] = md5($data['str_to']);

        $language = Language::find($request->id);
        $l = Language::where('code', $data['code'])->first();

        if ($language) {
            if ($l && $language->code === $l->code && $language->id !== $l->id) {
                return back()->with('notify', ['error' => 'The word domain already exists.', 'type' => 'errror']);
            }
            $language->update($data);
        } else {
            if ($l) {
                return back()->with('notify', ['error' => 'The word domain already exists.', 'type' => 'errror']);
            }
            Language::create($data);
        }
        Artisan::call('cache:clear');
        return back()->with('notify', ['message' => isset($data['id']) && $data['id'] ? 'Update success.' : 'Create success!', 'type' => 'success']);
    }

    public function edit($id)
    {
        return view('admin.language.store', compact('id'));
    }

    public function destroy($id)
    {
        Language::findorfail($id)->delete();
        return back()->with('notify', ['message' => 'Deleted', 'type' => 'warning']);
    }
}

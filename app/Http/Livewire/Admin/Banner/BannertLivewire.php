<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Http\Livewire\TraitLivewire\Modal;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class BannertLivewire extends Component
{
    use Modal;

    public function render()
    {
        $banners = Banner::all();
        return view('livewire.admin.banner.index', [
            'banners' => $banners
        ]);
    }

    public function updateStatus($id)
    {
        $banner = Banner::find($id);
        if (!$banner) return redirect(Request::url());
        $status = $banner->status === 'close' ? 'open' : 'close';
        $banner->update(['status' => $status]);
    }
}

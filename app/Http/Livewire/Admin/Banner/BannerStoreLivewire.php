<?php

namespace App\Http\Livewire\Admin\Banner;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class BannerStoreLivewire extends Component
{
    public $banners = '';

    public function mount($id)
    {
        if (isset($id) && $id) {
            $this->banners = Banner::find($id);
            if (!$this->banners) abort(404);
        }
    }

    public function render()
    {
        return view('livewire.admin.banner.store', [
            'banner' => $this->banners
        ]);
    }
}

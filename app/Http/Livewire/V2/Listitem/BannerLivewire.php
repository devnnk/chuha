<?php

namespace App\Http\Livewire\V2\Listitem;

use App\Models\Banner;
use Livewire\Component;

class BannerLivewire extends Component
{
    public function render()
    {
        $banners = Banner::where('status', 'open')->orderby('position', 'DESC')->get();
        return view('livewire.v2.listitem.banner', [
            'banners' => $banners,
        ]);
    }
}

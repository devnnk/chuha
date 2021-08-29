<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Http\Livewire\Admin\Category\{CategoryLivewire, CategoryStoreLivewire};
use App\Http\Livewire\Admin\Item\{ItemLivewire, ItemStoreLivewire};
use App\Http\Livewire\Admin\Product\{ProductLivewire, ProductStoreLivewire};
use App\Http\Livewire\Admin\Banner\{BannerLivewire, BannerStoreLivewire};
use App\Http\Livewire\Admin\Language\{LanguageLivewire, LanguageStoreLivewire};
use App\Http\Livewire\Admin\Order\OrderLivewire;
use App\Http\Livewire\Components\{HeaderV2, DeleteModal, SearchV2, CartV2};
use App\Http\Livewire\V2\Listitem\BannerLivewire as BannerSlider;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->registerComponents();
    }

    protected function registerComponents()
    {
        $components = [
            'admin-category' => CategoryLivewire::class,
            'admin-category-store' => CategoryStoreLivewire::class,
            'admin-product' => ProductLivewire::class,
            'admin-product-store' => ProductStoreLivewire::class,
            'admin-item' => ItemLivewire::class,
            'admin-item-store' => ItemStoreLivewire::class,
            'admin-banner' => BannerLivewire::class,
            'admin-banner-store' => BannerStoreLivewire::class,
            'admin-language' => LanguageLivewire::class,
            'admin-language-store' => LanguageStoreLivewire::class,
            'admin-order' => OrderLivewire::class,

            'delete-modal' => DeleteModal::class,
            'header-v2' => HeaderV2::class,
            'search-v2' => SearchV2::class,
            'cart-v2' => CartV2::class,

            'listitem-banner-v2' => BannerSlider::class,
        ];

        foreach ($components as $name => $class) {
            Livewire::component("{$name}", $class);
        }
    }
}

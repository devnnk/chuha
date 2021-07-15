<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Http\Livewire\Admin\Category\CategoryLivewire;
use App\Http\Livewire\Admin\Category\CategoryStoreLivewire;
use App\Http\Livewire\Components\DeleteModal;
use App\Http\Livewire\Components\HeaderV2;

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
            'delete-modal' => DeleteModal::class,
            'header-v2' => HeaderV2::class
        ];

        foreach ($components as $name => $class) {
            Livewire::component("{$name}", $class);
        }
    }
}

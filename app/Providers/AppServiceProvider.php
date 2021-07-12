<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use App\Http\Livewire\Admin\CategoryLivewire;
use App\Http\Livewire\Components\DeleteModal;

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
            'delete-modal' => DeleteModal::class
        ];

        foreach ($components as $name => $class) {
            Livewire::component("{$name}", $class);
        }
    }
}

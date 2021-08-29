<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Language;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.order.index');
    }
}

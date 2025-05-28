<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    // Trang chủ mặc định
    public function homeDefault()
    {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }
}

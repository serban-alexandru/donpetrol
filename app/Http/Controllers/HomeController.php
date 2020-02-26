<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $categories = Category::all();
        $products = Product::all();
        $orders = Order::all();

        return view('admin.home')->with([
            'categories' => $categories,
            'products' => $products,
            'orders' => $orders,
        ]);
    }
}

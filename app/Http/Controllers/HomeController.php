<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Settings;

class HomeController extends Controller
{
    public function redirect()
    {
        if(Auth::id()) {
            $role = Auth::user()->role;
            if($role=="admin")
            {
                $settings = Settings::first();
                $orders = Order::latest()->paginate(10);
                $allUsers = User::where('role', 'user')->count();
                $allProducts = Product::where('qty', '>', '0')->count();
                $newOrders = Order::where('status', '0')->count();
                $totalSales = Order::where('status', '1')->sum('total_price'); // Data for total amount of completed orders and sumation
                return view('admin.index', compact('totalSales','newOrders', 'allProducts','allUsers','orders','settings'));
            }
            else
            { 
                $cartCount = Cart::where('user_id', Auth::id())->count();
                $products = Product::where('qty', '>', '0')->latest()->paginate(8);
                $categories = Category::all();
                $trending = Product::where('trending', 'YES')->get();
                $settings = Settings::first();
                return view('welcome', compact('products', 'categories', 'trending','cartCount','settings'));
            }
        }
        else
        {
            return redirect('/login');
        }
    }

    public function shopView()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $trending = Product::where('trending', 'YES')->get();
        $products = Product::where('qty', '>', '0')->latest()->paginate(8);
        $categories = Category::all();
        $settings = Settings::first();
        return view('shop', compact('cartCount','trending','products','categories', 'settings'));
    }

    public function aboutView()
    {
        $settings = Settings::first();
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $trending = Product::where('trending', 'YES')->get();
        return view('about', compact('cartCount','trending','settings'));
    }

    public function contactView()
    {
        $settings = Settings::first();
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $trending = Product::where('trending', 'YES')->get();
        return view('contact', compact('cartCount','trending','settings'));
    }



}

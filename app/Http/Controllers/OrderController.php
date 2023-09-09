<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Settings;

class OrderController extends Controller
{
    public function newOrders()
    {
        $settings = Settings::first();
        $newOrders = Order::where('status', '0')->count();
        $orders = Order::where('status', 0)->latest()->get();
        return view('admin.orders.index', compact('orders','newOrders','settings'));
    }

    // view a specific orders from admin end
    public function viewOrder($id)
    {
        $settings = Settings::first();
        $orders = Order::where('id', $id)->first();
        $newOrders = Order::where('status', '0')->count();
        return view('admin.orders.view', compact('orders','newOrders','settings'));
    }

    public function updateOrder(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('new-orders')->with('success', "Order Updated Successfully");
    }

    public function orderHistory()
    {
        $settings = Settings::first();
        $orders = Order::where('status', '1')->get();
        $newOrders = Order::where('status', '0')->count();
        return view('admin.orders.history', compact('orders','newOrders','settings'));
    }

    public function userOrders()
    {
        $orders = Order::where('status', '0')->get();
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $settings = Settings::first();
        return view('users.order.index', compact('orders','cartCount','settings'));
    }

    public function usersViewOrder($id)
    {
        $orders = Order::where('id', $id)->first();
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $settings = Settings::first();
        return view('users.order.view', compact('orders','cartCount','settings'));
    }

    public function userOrdersHistory()
    {
        $orders = Order::where('status', '1')->get();
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $settings = Settings::first();
        return view('users.order.history', compact('orders','cartCount','settings'));
    }

}

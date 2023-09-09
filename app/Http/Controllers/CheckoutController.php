<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\AccountSettings;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;
use App\Models\Settings;

class CheckoutController extends Controller
{
    // Constructing function for middleware
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(Request $request)
    {
        if(Auth::id()){
            $image=$request->image;
            $cartCount = Cart::where('user_id', Auth::id())->count();
    
            $old_cartItems = Cart::where('user_id', Auth::id())->get();
            foreach($old_cartItems as $item)
            {
                if(!Product::where('id', $item->prod_id)->exists())
                {
                    $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                    $removeItem->delete();
                }
            }
            $cartViews = Cart::where('user_id', Auth::id())
            ->join('products', 'carts.prod_id', '=', 'products.id')
            ->get();
    
            $accounts = AccountSettings::all();
            $settings = Settings::first();
    
            return view('checkout.index', compact('cartViews','cartCount','image', 'accounts','settings'));
        }
        else
        {
            return redirect('login')->with('Warning', 'Login to start your session');
        }
       
    }
    
    public function buy_index(Request $request, $id)
    {
        $product_qty = $request->input('qty');
        
        $image=$request->image;
        $cartCount = Cart::where('user_id', Auth::id())->count();


        $prod_view = Product::find($id);

        $accounts = AccountSettings::all();
        $settings = Settings::first();

        return view('checkout.buy_checkout', compact('prod_view','cartCount','image', 'accounts','settings'));
    }

    public function placeOrder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->country = $request->input('country');
        $order->address = $request->input('address');
        $order->state = $request->input('state');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->message = $request->input('message');

        $image=$request->image;

        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('receipt', $imagename);
        $order->image=$imagename;

        $order->total_price = $request->input('total_price');

        $order->save();

        // Purchase product without Auth
        $Prod_id = $request->input('prod_id');
        $prod_items = Product::where('id', $Prod_id)->get();

        foreach($prod_items as $item)
        {
            OrderItems::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->id,
                'prod_qty'=> 1,
                'price'=>$item->selling_price,
            ]);
            
            $prod = Product::where('id', $Prod_id)->first();
            $prod->qty = $prod->qty - 1;
            $prod-> update();
        }

        if(Auth::id())
        {
            $cartitems = Cart::where('user_id', Auth::id())
            ->join('products', 'carts.prod_id', '=', 'products.id')
            ->get();
            foreach($cartitems as $item)
            {
                OrderItems::create([
                    'order_id'=>$order->id,
                    'prod_id'=>$item->prod_id,
                    'prod_qty'=>$item->quantity,
                    'price'=>$item->selling_price,
                ]);
                
                $prod = Product::where('id', $item->prod_id)->first();
                $prod->qty = $prod->qty - $item->quantity;
                $prod-> update();
            }

            if(Auth::user()->address==NULL)
            {
                $user = User::where('id', Auth::id())->first();

                $user->country = $request->input('country');
                $user->address = $request->input('address');
                $user->state = $request->input('state');
                $user->phone = $request->input('phone');
                $user->update();
            }

            $cartitems = Cart::where('user_id', Auth::id())->get();

            Cart::destroy($cartitems);
        }


        return redirect()->back()->with('success', "Order Placed Successfully");
    }
}

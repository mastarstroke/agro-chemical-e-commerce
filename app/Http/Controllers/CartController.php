<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Settings;

class CartController extends Controller
{
    public function productDetails($id)
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $products = Product::find($id);
        $featured = Product::find($id)->where('cate_id', $products->cate_id)->get();
        $settings = Settings::first();
        return view('cart.product-details', compact('products','featured','cartCount','settings'));
    }

    public function addToCart(Request $request, $id)
    {
        $product_qty = $request->input('qty');

        if(Auth::id())
        {
            $user_id= Auth::id();
            $prod_id=$id;
            
            $prod_check = Product::where('id', $prod_id)->first();

            if($prod_check)
            {
                if(Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists())
                {
                    return redirect()->back()->with('warning', "Oops! .$prod_check->name.  Already Added to cart");
                }
                else{
                    $cart=new Cart;
                    $cart->user_id=$user_id;
                    $cart->prod_id=$prod_id;
                    $cart->quantity=$product_qty;

                    $cart->save();

                    return redirect()->back()->with('success',  ".$prod_check->name. Added to cart successfully!");
                }
            }
        }
            else
            {
                return redirect('/login')->with('success',  "Please Login First");
            }
    }

    public function cartView()
    {
        $cartCount = Cart::where('user_id', Auth::id())->count();
        $cartViews = Cart::where('user_id', Auth::id())
                ->join('products', 'carts.prod_id', '=', 'products.id')
                ->get();
        $settings = Settings::first();
        return view('cart.index', compact('cartCount', 'cartViews','settings'));
    }

    public function deleteCart($id)
    {
        Cart::where('prod_id', $id)->delete();
        return redirect()->back()->with('success','Item Deleted!');
    }

}

<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaystackController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway(Request $request)
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
        try{  
            $data = array(
                "amount" => $order->total_price * 100,
                "reference" => $request->reference,
                "email" => $order->email,
                "currency" => 'NGN',
                "orderID" => 'PayStackID'.rand(11111,99999),
            );
            
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->with(['error'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        // dd($paymentDetails);

        // Update records after successfull payment
        if(Order::where('user_id', Auth::id()))
        {
            $order = Order::latest()->first();
            $order->payment = 'PayStack/' . $paymentDetails['data']['channel'];
            $order->save();
        }
        // Back to Home page with sweet alert displaying the payment ID
        return Redirect::to('checkout')
        ->with('success', 'ORDER PLACED SUCCESSFULLY! ..Your payment ID is : '. $order->payment_id );  
    }
}

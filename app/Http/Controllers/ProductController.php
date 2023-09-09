<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Settings;

use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function addProducts()
    {
        $settings = Settings::first();
        $categories = Category::all();
        $newOrders = Order::where('status', '0')->count();
        return view('admin.products.add', compact('categories','newOrders','settings'));
    }

    public function addProduct(Request $request)
    {
        // This validate the required input from the add products page
        $this->validate($request,[
            'name' => 'required|string',
            'cate_id' => 'required',
            'original_price' => 'required',
            'selling_price' => 'required',
            'qty' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp',
        ]);

        // Store the datas here with the image in the public.pruductimage folder
        // into the ProductModels table.

        $product = new Product();

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);
        $product->image = $imagename;

        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->qty = $request->qty;
        $product->trending = $request->input('trending') == TRUE ? 'YES': 'NO';
        $product->description = $request->small_description;
        $product->save();

        return redirect()->back()->with('success','Product Added Successfully!');// sweet alert here
        $this->reset();  // reset the page back to initial
    }

    public function viewProduct(Request $request)
    {
        $products = Product::latest()->paginate(10);

        if($request->productName)
        {
            $products = Product::where('name', 'LIKE', '%'.$request->productName. '%')->latest()->paginate(2);
        }
        $newOrders = Order::where('status', '0')->count();
        $settings = Settings::first();
        return view('admin.products.index', compact('products','newOrders','settings'));
    }

    public function editProduct($id)
    {
        $settings = Settings::first();
        $categories = Category::all();
        $product = Product::find($id);
        $newOrders = Order::where('status', '0')->count();
        return view('admin.products.edit', compact('categories', 'product','newOrders','settings'));
    }

    public function updateProduct(Request $request, $id)
    {
        // This validate the required input from the add products page
        $this->validate($request,[
            'name' => 'required|string',
            'original_price' => 'required',
            'selling_price' => 'required',
            'qty' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,bmp',
        ]);

        // Store the datas here with the image in the public.pruductimage folder
        // into the ProductModels table.

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('productimage', $imagename);

        $product = Product::find($id);

        // If there is an old image, delete it
        if($product->image) {
        $absolutePath = public_path($product->image);
        File::delete($absolutePath);
        }

        $product->image = $imagename;

        $product->cate_id = $request->cate_id;
        $product->name = $request->name;
        $product->original_price = $request->original_price;
        $product->selling_price = $request->selling_price;
        $product->qty = $request->qty;
        $product->trending = $request->input('trending') == TRUE ? 'YES': 'NO';
        $product->description = $request->small_description;
        $product->update();

        return redirect()->back()->with('success','Product Updated Successfully!');// sweet alert here
    }

    public function deleteProduct($id)
    {
        Product::find($id)->delete();
        return redirect()->back()->with('success','Product Deleted Successfully!');
    }
}

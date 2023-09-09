<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Settings;

class CategoryController extends Controller
{
    public function addCategories()
    {
        $settings = Settings::first();
        $newOrders = Order::where('status', '0')->count();
        return view('admin.category.add', compact('newOrders','settings'));
    }

    public function addCategory(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        return redirect()->back()->with('success', "Category Added Successfully");
    }

    public function viewCategory()
    {
        $settings = Settings::first();
        $categories = Category::all();
        $newOrders = Order::where('status', '0')->count();
        return view('admin.category.index', compact('categories','newOrders','settings'));
    }

    public function editCategory($id)
    {
        $settings = Settings::first();
        $categories = Category::find($id);
        $newOrders = Order::where('status', '0')->count();
        return view('admin.category.edit', compact('categories','newOrders','settings'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->update();

        return redirect()->back()->with('success', "Category Updated Successfully");
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('success', "Category Deleted Successfully");
    }
}

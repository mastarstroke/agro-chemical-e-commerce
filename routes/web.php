<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CacheController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $cartCount = App\Models\Cart::where('user_id', Auth::id())->count();
    $products = App\Models\Product::latest()->paginate(8);
    $categories = App\Models\Category::all();
    $trending = App\Models\Product::where('trending', 'YES')->get();
    $settings = App\Models\Settings::first();;
    return view('welcome', compact('products', 'categories', 'trending','cartCount','settings'));
});


Route::get('redirects', [HomeController::class, 'redirect']);
Route::get('shop-view', [HomeController::class, 'shopView'])->name('shop-view');
Route::get('about-us', [HomeController::class, 'aboutView'])->name('about-us');
Route::get('contact-us', [HomeController::class, 'contactView'])->name('contact-us');

Route::get('product/details/{id}', [CartController::class, 'productDetails'])->name('product/details');
Route::post('addtocart/{id}', [CartController::class, 'addToCart'])->name('addtocart');
Route::get('cart-view', [CartController::class, 'cartView'])->name('cart-view');
Route::delete('cart/delete/{id}', [CartController::class, 'deleteCart'])->name('delete-cart');

Route::get('buy-checkout/{id}', [CheckoutController::class, 'buy_index'])->name('buy-checkout');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('place-order', [CheckoutController::class, 'placeOrder'])->name('place-order');

Route::get('my-orders', [OrderController::class, 'userOrders'])->name('my-orders');
Route::get('users-view-orders/{id}', [OrderController::class, 'usersViewOrder'])->name('users-view-orders');
Route::get('users-orders-history', [OrderController::class, 'userOrdersHistory'])->name('users-orders-history');


Route::middleware('auth:sanctum')->group(function () {
    
Route::get('add/categories', [CategoryController::class, 'addCategories'])->name('add/categories');
Route::post('add/category', [CategoryController::class, 'addCategory'])->name('add/category');
Route::get('view/category', [CategoryController::class, 'viewCategory'])->name('view/category');
Route::get('category/edit/{id}', [CategoryController::class, 'editCategory'])->name('edit-category');
Route::post('category/update/{id}', [CategoryController::class, 'updateCategory'])->name('update-category');
Route::delete('category/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');


Route::get('add/products', [ProductController::class, 'addProducts'])->name('add/products');
Route::post('add/product', [ProductController::class, 'addProduct'])->name('add/product');
Route::get('view/product', [ProductController::class, 'viewProduct'])->name('view/product');
Route::get('product/edit/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
Route::post('product/update/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
Route::delete('product/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete-product');

Route::get('users/view', [ManagementController::class, 'users'])->name('users/view');
Route::get('settings/view', [ManagementController::class, 'settings'])->name('settings/view');
Route::post('settings/change', [ManagementController::class, 'settingChange'])->name('settings/change');
Route::get('settings/account/add', [ManagementController::class, 'settingAccountAdd'])->name('settings/account/add');
Route::post('settings/account/store', [ManagementController::class, 'settingAccountStore'])->name('settings/account/store');
Route::get('settings/account/edit/{id}', [ManagementController::class, 'settingAccountEdit'])->name('settings/account/edit');
Route::post('settings/account/update/{id}', [ManagementController::class, 'settingAccountUpdate'])->name('settings/account/update');
Route::delete('settings/account/delete/{id}', [ManagementController::class, 'settingAccountDelete'])->name('settings/account/delete');
Route::post('settings/account/{id}', [ManagementController::class, 'settingAccount'])->name('settings/account');

Route::get('new-orders', [OrderController::class, 'newOrders'])->name('new-orders');
Route::get('view-order/{id}', [OrderController::class, 'viewOrder'])->name('view-order');
Route::post('update-order/{id}', [OrderController::class, 'updateOrder'])->name('update-order');
Route::get('order-history', [OrderController::class, 'orderHistory'])->name('order-history');

Route::get('caches', [CacheController::class, 'caches']);
Route::get('clear-caches', [CacheController::class, 'clearCaches']);

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

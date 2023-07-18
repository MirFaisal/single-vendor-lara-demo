<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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

    if (Auth::guard('customer_guard')->user()) {
        $products = Product::all();
        $customer = Auth::guard('customer_guard')->user();
        return view('welcome', compact(['products', 'customer']));
    }
    return redirect(route('customer.login'));
})->name('home');


Route::get('/dashboard', function () {
    $products = Product::all();
    return view('dashboard', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

// for admin
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/product', [ProductController::class, 'index'])->name('product');
    Route::post('/product/add', [ProductController::class, 'store'])->name('product.store');

    Route::get('/brand', [BrandController::class, 'index'])->name('brand');
    Route::post('/brand/add', [BrandController::class, 'store'])->name('brand.store');

    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::post('/category/add', [CategoryController::class, 'store'])->name('category.store');

});

// for user
Route::get('user/register', [CustomerController::class, 'index'])->name('customer.register');
Route::get('user/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::post('user/register/store', [CustomerController::class, 'store'])->name('customer.store');

Route::get('user/login', [CustomerController::class, 'loginIndex'])->name('customer.login');
Route::post('user/login/store', [CustomerController::class, 'loginStore'])->name('customer.login.store');

// for cart

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/add', [CartController::class, 'store'])->name('cart.store');



require __DIR__ . '/auth.php';
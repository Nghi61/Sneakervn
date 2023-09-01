<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckUserRole;
use GuzzleHttp\Client;

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

Route::get('/', [ClientsController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('Admin.home');
})->name('admin');

Route::get('/admin/404', function () {
    return view('Admin.404');
});

Route::resource('/admin/user', UserController::class);

Route::resource('/admin/product', ProductController::class);

Route::resource('/admin/categories', CategoriesController::class);

Route::get('/accounts', function () {
    return view('Clients.accounts');
})->name('account');

Route::get('/trackOrder', function () {
    $bill=[];
    return view('Clients.trackOrder',['bill'=>$bill]);
})->name('trackOrder');

Route::post('trackOrder',[ClientsController::class,'trackOrder'])->name('trackOrderResault');

Route::get('/help', function () {
    return view('Clients.help');
})->name('help');

Route::get('/cart', function () {
    return view('Clients.cart');
});
Route::post('/cart', [ClientsController::class, 'cart'])->name('cart');

Route::get('/cart/delete/{id}', [ClientsController::class, 'cartDelete'])->name('cart.delete');

Route::post('/checkout', [ClientsController::class, 'checkout'])->name('checkout');

Route::get('/checkout/view', [ClientsController::class, 'checkoutview'])->name('checkout.view');

route::post('/search', [ClientsController::class, 'search'])->name('search');
route::get('/search', [ClientsController::class, 'search']);

Route::get('/confirm', [ClientsController::class,'confirm']);
Route::post('/confirm', [ClientsController::class,'confirm'])->name('confirm');

Route::get('/product/detail/{id}', [ClientsController::class, 'ProductDetail'])->name('product.detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/comment', [ClientsController::class, 'comment'])->name('comment');
});


require __DIR__ . '/auth.php';

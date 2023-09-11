<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CommentsBlogController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CommentsProductController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ClientsController::class, 'index'])->name('home');

Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');

Route::post('/admin/login',[AdminController::class,'handle']);

Route::get('/admin/404', function () {
    return view('admin.404');
});

Route::middleware('admin')->group(function(){

    Route::get('/admin',[AdminController::class,'index'])->name('admin');

    Route::resource('/admin/user', UserController::class);

    Route::post('admin/user/search',[UserController::class,'search'])->name('user.search');

    Route::post('admin/user/delete',[UserController::class,'delete'])->name('user.delete');

    Route::resource('/admin/product', ProductController::class);

    Route::post('admin/product/search',[ProductController::class,'search'])->name('product.search');

    Route::post('admin/product/delete',[ProductController::class,'delete'])->name('product.delete');

    Route::resource('/admin/categories', CategoriesController::class);

    Route::post('admin/categories/deleteCate',[CategoriesController::class,'deleteCate'])->name('categories.delete');

    Route::resource('/admin/commentproduct', CommentsProductController::class);

    Route::post('admin/commentproduct/search',[CommentsProductController::class,'search'])->name('commentproduct.search');

    Route::resource('/admin/commentblog', CommentsBlogController::class);

    Route::post('admin/commentblog/search',[CommentsBlogController::class,'search'])->name('commentblog.search');

    Route::resource('/admin/contract', ContractController::class);

    Route::post('admin/contract/search',[ContractController::class,'search'])->name('contract.search');

    Route::resource('/admin/blog', BlogController::class);

    Route::post('admin/blog/search',[BlogController::class,'search'])->name('blog.search');

    Route::resource('/admin/bill', BillController::class);

    Route::post('admin/bill/search',[BillController::class,'search'])->name('bill.search');

    Route::get('admin/bill/{id}/cart',[BillController::class,'cart']);

    Route::post('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
}
);

Route::get('/accounts', function () {
    return view('clients.accounts');
})->name('account');


Route::get('/about', function () {
    return view('clients.about');
})->name('about');

Route::get('/contract', function () {
    return view('clients.contract');
})->name('contract');

Route::post('/contract', [ClientsController::class,'Contract'])->name('contract');

Route::get('/help', function () {
    return view('clients.help');
})->name('help');

route::post('/search', [ClientsController::class, 'search'])->name('search');
route::get('/search', [ClientsController::class, 'search']);

route::get('/sale', [ClientsController::class, 'sale'])->name('sale');

Route::get('/trackOrder', function () {
    $bill=[];
    return view('clients.trackOrder',['bill'=>$bill]);
})->name('trackOrder');

Route::post('/trackOrder',[ClientsController::class,'trackOrder'])->name('trackOrderResault');

Route::get('/product/detail/{slug}', [ClientsController::class, 'ProductDetail'])->name('product.detail');

route::get('/categories/{idc}/{id}', [ClientsController::class, 'categories'])->name('categories');

Route::get('/blog/{slug}',[ClientsController::class,'blog'])->name('blog');

Route::get('/blog',[ClientsController::class,'blogAll'])->name('blog.all');

Route::get('/cart', function () {
    return view('clients.cart');
});
Route::post('/cart', [ClientsController::class, 'cart'])->name('cart');

Route::get('/cart/delete/{id}', [ClientsController::class, 'cartDelete'])->name('cart.delete');

Route::post('/checkout', [ClientsController::class, 'checkout'])->name('checkout');

Route::get('/checkout/view', [ClientsController::class, 'checkoutview'])->name('checkout.view');

Route::post('/confirm', [ClientsController::class,'confirm'])->name('confirm');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/comment/product', [ClientsController::class, 'CommentProduct'])->name('comment.product');
    Route::post('/comment/blog', [ClientsController::class, 'CommentBlog'])->name('comment.blog');
});

require __DIR__ . '/auth.php';

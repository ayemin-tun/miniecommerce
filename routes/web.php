<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () { //...
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/contact', function () {
            return view('contact');
        });

        Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'productDetail']);

        // Admin Route

        Auth::routes();

        Route::group(['middleware' => ['auth']], function () {

            Route::get('cart', [CartController::class, 'allCart']);
            //for Checkout
            Route::post('/checkout', [HomeController::class, 'checkout']);
            Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

            //carts route
            Route::post('/product/addcart', [CartController::class, 'addToCart']);

            Route::get('/delete_cart/{id}', [CartController::class, 'deleteCart']);

            Route::post('/user/contact', [HomeController::class, 'sendContact']);

        });

        Route::group(['middleware' => ['superadmin']], function () {
            Route::get('/new_admin', function () {
                return view('create_admin');
            });
            Route::controller(UserController::class)->group(function () {
                Route::get('admin_list', 'adminList');
                ROute::post('admin/create', 'createAdmin');
                Route::post('/admin/update', 'adminUpdate')->name('admin_update');
                Route::get('/admin/edit/{id}', 'adminEdit');
                ROute::get('/admin/delete/{id}', 'deleteAdmin');
            });

            Route::get('/products/delete/{id}', [ProductController::class, 'deleteProducts']);
            // Route::get('/admin_list', [UserController::class, 'adminList']);
            // Route::post('admin/create', [UserController::class, 'createAdmin']);
            // Route::post('/admin/update', [UserController::class, 'adminUpdate'])->name('admin_update');

            // Route::get('/admin/edit/{id}', [UserController::class, 'adminEdit']);
            // Route::get('/admin/delete/{id}', [UserController::class, 'deleteAdmin']);
        });

        Route::group(['middleware' => ['admin']], function () {
            Route::get('/products_list', [ProductController::class, 'getProducts']);
            Route::get('/products/edit/{id}', [ProductController::class, 'editProducts']);
            Route::post('/products/update', [ProductController::class, 'updateProduct'])->name('update_product');
            Route::post('/new', [ProductController::class, 'newProduct'])->name('insert_product');
            Route::get('/new', function () {
                return view('new_product');
            });
        });

        Route::get('test', function () {

            $query = DB::table('users')->select('name');

            $users = $query->addSelect('email')->get();

            dd($users);
        });

    });

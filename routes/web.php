<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CaryearController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ModelpriceController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.home');
});
Route::get('/appointment', [HomeController::class, 'index']);
Route::get('/time', [HomeController::class, 'time']);
Route::get('/shop', [HomeController::class, 'shop']);
Route::post('/appointment', [AppoinmentController::class, 'store']);
Route::get('/time', [AppoinmentController::class, 'time']);
Route::get('/location_price', [HomeController::class, 'price']);



Route::get('/dashboard', function () {
    return view('admin_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // location routes

    Route::get('/locations', [LocationController::class, 'index']);
    Route::get('/add_location', [LocationController::class, 'create']);
    Route::post('/add_location', [LocationController::class, 'store']);
    Route::get('/location_edit/{id}', [LocationController::class, 'edit']);
    Route::post('/location_edit/{id}', [LocationController::class, 'update']);
    Route::get('/location_delete/{id}', [LocationController::class, 'destroy']);

    //Orders
    Route::get('/orders',[CartController::class, 'Orders']);
    Route::get('/allappoinments',[AppoinmentController::class, 'index']);
    Route::get('/appoinment-delete/{id}',[AppoinmentController::class, 'destroy']);
    Route::get('/appoinment-detail/{id}',[AppoinmentController::class, 'detail']);
    Route::get('/order-detail/{id}',[CartController::class, 'Detail']);

        //   model price
        //
        Route::get('model-price',[ModelpriceController::class, 'index']);
        Route::get('/add-model-price',[ModelpriceController::class, 'show']);
        // Route::post('/add-model-price',[ModelpriceController::class, 'store']);
        Route::get('/model-fetch',[ModelpriceController::class, 'model_get']);
        Route::get('/year-fetch',[ModelpriceController::class, 'year_get']);
        Route::post('/model-price-add',[ModelpriceController::class, 'store']);


});

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('brands', BrandController::class);
Route::resource('carmodels', CarModelController::class);
Route::resource('caryears', CaryearController::class);
Route::resource('price', PriceController::class);





//cart routes
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update-cart');
Route::delete('remove-cart', [CartController::class, 'remove'])->name('remove-cart');
//checkout routes
Route::middleware('auth')->group(function(){
Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('doCheckout', [CartController::class, 'doCheckout'])->name('doCheckout');
});

//Fb login
Route::controller(FacebookController::class)->group(function () {
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});
//Google login
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
require __DIR__ . '/auth.php';

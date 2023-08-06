<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebController;


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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login',function(){
    return view('login');
});
Route::get('/logout',function(){
    Session::forget('user');
    return redirect('login');
});
Route::post('/login',[UserController::class,'login']);
Route::get('/',[ProductController::class,'index']);
Route::get('detail/{id}',[ProductController::class,'detail']);
Route::post('/add_to_cart',[ProductController::class,'addToCart']);
// Route::get("cartlist",[ProductController::class,'cartList']);
Route::match(['get', 'post'], '/cartlist', [ProductController::class, 'cartList']);
Route::get('remove/{id}',[ProductController::class,'removeCart']);
Route::get('ordernow',[ProductController::class,'orderNow']);
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);
Route::get("register",[UserController::class,'register'])->name('save');
Route::post("register",[UserController::class,'save'])->name('save');

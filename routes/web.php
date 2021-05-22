<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {
	Session::forget('user');
    return redirect('login');
});
Route::view('/daftar', 'daftar');
Route::post('/login', [UserController::class,'login']);
Route::post('/daftar', [UserController::class,'daftar']);
Route::get('/', [ProductController::class,'index']);
Route::get('/detail/{id}', [ProductController::class,'details']);
Route::get('search',[ProductController::class,'search']);
Route::post('keranjang',[ProductController::class,'keranjang']);
Route::get('daftar_barang',[ProductController::class,'daftar_barang']);
Route::get('hapus/{id}',[ProductController::class,'hapus']);
Route::get('order/',[ProductController::class,'Order']);
Route::post('checkout',[ProductController::class, 'checkout']);
Route::get('myorder/',[ProductController::class,'myorder']);
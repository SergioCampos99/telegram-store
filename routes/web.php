<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('auth.login');
 });
/*
Route::get('/Products', function () {
    return view('Products.index');
});

Route::get('/Products/create', [ProductController::class, 'create']);
*/
//Route::resource('Users', UserController::class);
Route::resource('Products', ProductController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [ProductController::class, 'index'])->name('home');
Route::group(['middleware'=>'auth'], function(){

    Route::get('/', [ProductController::class, 'index'])->name('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

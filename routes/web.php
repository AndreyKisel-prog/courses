<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\Admin\ProductController;

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


Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function(){
    Route::get('/', [MainController::class, 'show'])->name('admin.show');
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('orders', OrderController::class);
});


Route::get('/shop', [PresentationController::class, 'index'] )->middleware('auth')->name('shop');

Route::get('/{course_id}', [ItemController::class, 'index'] )->middleware('auth')->name('item.index');
Route::post('/{course_id}', [ItemController::class, 'store'] )->middleware('auth')->name('item.store');

Route::get('/', [HomeController::class, 'index'])->name('home');








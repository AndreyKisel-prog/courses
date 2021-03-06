<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\PresentationController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\ItemController;
use App\Http\Controllers\Customer\PrivateController;
use App\Http\Controllers\Moderator\ModeratorMainController;
use App\Http\Controllers\Moderator\ModeratorCourseController;

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

Route::group([
    'prefix' => 'admin',
    'middleware' => ['role:admin'],
    'name' => 'admin',
], function () {
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class)->names([
        'index' => 'admin.courses.index',
        'edit' => 'admin.courses.edit',
        'update' => 'admin.courses.update',
        'create' => 'admin.courses.create',
        'store' => 'admin.courses.store',
        'destroy' => 'admin.courses.destroy',
        'destroy' => 'admin.courses.destroy',
    ]);
    Route::resource('roles', RoleController::class);
    Route::resource('orders', OrderController::class);
    Route::get('/', [MainController::class, 'show'])->name('show');
});

Route::group([
    'prefix' => 'moderator',
    'middleware' => ['role:moderator'],
    'name'=>'moderator'
], function () {
    Route::resource('courses', ModeratorCourseController::class)->names([
        'index' => 'moderator.courses.index',
    ]);
    Route::get('/', [ModeratorMainController::class, 'index'])->name('main');
});

Route::group([
    'middleware' => ['auth'],
], function(){
    Route::get('/personal', [PrivateController::class, 'edit'])->name('personal.edit');
    Route::put('/personal', [PrivateController::class, 'updatePersonalData'])->name('personal.update');
    Route::get('/shop', [PresentationController::class, 'index'])->name('shop');
    Route::get('/{course_id}', [ItemController::class, 'index'])->name('item.index');
    Route::post('/{course_id}', [ItemController::class, 'store'])->name('item.store');
    Route::delete('/{course_id}', [ItemController::class, 'destroy'])->name('item.destroy');
    Route::get('/', [HomeController::class, 'index'])->name('home');
});


Route::fallback(function() {
    return 'Hm, why did you land here somehow?';
});

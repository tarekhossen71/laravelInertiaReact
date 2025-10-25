<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/landing', function () {
    return view('landing');
});
Route::get('/landing2', function () {
    return view('landing2');
});
Route::get('/', function () {
    return Inertia::render('Home');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::group(['as'=>'app.','middleware'=>['auth','permission']], function(){
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // Role Routes
    Route::group(['as'=>'role.','prefix'=>'role/'], function(){
        Route::get('/', [RoleController::class,'index'])->name('index');
        Route::get('create', [RoleController::class,'create'])->name('create');
        Route::post('store', [RoleController::class,'store'])->name('store');
        Route::get('edit/{id}', [RoleController::class,'edit'])->name('edit');
        Route::put('update/{id}', [RoleController::class,'update'])->name('update');
        Route::post('delete', [RoleController::class,'delete'])->name('delete');
        Route::post('bulk-delete', [RoleController::class,'bulk_delete'])->name('bulk.delete');
    });

    // User Routes
    Route::group(['as'=>'user.','prefix'=>'user/'], function(){
        Route::get('/', [UserController::class,'index'])->name('index');
        Route::get('create', [UserController::class,'create'])->name('create');
        Route::post('store', [UserController::class,'store'])->name('store');
        Route::get('edit/{id}', [UserController::class,'edit'])->name('edit');
        Route::post('update/{id}', [UserController::class,'update'])->name('update');
        Route::post('delete', [UserController::class,'delete'])->name('delete');
        Route::post('bulk-delete', [UserController::class,'bulk_delete'])->name('bulk.delete');
    });

    // Setting Routes
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('settings/store-or-update', [SettingController::class, 'storeOrUpdate'])->name('setting.store-or-update');

});

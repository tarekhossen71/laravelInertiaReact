<?php

use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/landing', function () {
//     return view('landing');
// });
// Route::get('/landing2', function () {
//     return view('landing2');
// });
// Route::get('/t-shirt', function () {
//     return view('t-shirt');
// });
// Route::get('/t-shirt2', function () {
//     return view('t-shirt2');
// });
Route::get('/', function () {
    return Inertia::render('Home');
});
// Route::get('/test/{name}', function ($name) {
//     return Inertia::render('Test',[
//         'name' => $name
//     ]);
// });



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

    // PRODUCT
    Route::group(['as' => 'product.', 'prefix' => 'product/'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('update');
        Route::post('delete', [ProductController::class, 'delete'])->name('delete');
        Route::post('bulk-delete', [ProductController::class, 'bulk_delete'])->name('bulk.delete');
    });

    // VARIANT
    Route::group(['as' => 'variant.', 'prefix' => 'variant/'], function () {
        Route::get('/', [VariantController::class, 'index'])->name('index');
        Route::get('create', [VariantController::class, 'create'])->name('create');
        Route::post('store', [VariantController::class, 'store'])->name('store');
        Route::get('edit/{id}', [VariantController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [VariantController::class, 'update'])->name('update');
        Route::post('delete', [VariantController::class, 'delete'])->name('delete');
        Route::post('bulk-delete', [VariantController::class, 'bulk_delete'])->name('bulk.delete');
    });

    // ORDER
    Route::group(['as' => 'order.', 'prefix' => 'order/'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('create', [OrderController::class, 'create'])->name('create');
        Route::post('store', [OrderController::class, 'store'])->name('store');
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [OrderController::class, 'update'])->name('update');
        Route::post('delete', [OrderController::class, 'delete'])->name('delete');
        Route::post('bulk-delete', [OrderController::class, 'bulk_delete'])->name('bulk.delete');
    });

    // PAYMENT
    Route::group(['as' => 'payment.', 'prefix' => 'payment/'], function () {
        Route::get('/', [PaymentController::class, 'index'])->name('index');
        Route::get('create', [PaymentController::class, 'create'])->name('create');
        Route::post('store', [PaymentController::class, 'store'])->name('store');
        Route::get('edit/{id}', [PaymentController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [PaymentController::class, 'update'])->name('update');
        Route::post('delete', [PaymentController::class, 'delete'])->name('delete');
        Route::post('bulk-delete', [PaymentController::class, 'bulk_delete'])->name('bulk.delete');
    });

    // DELIVERY
    Route::group(['as' => 'delivery.', 'prefix' => 'delivery/'], function () {
        Route::get('/', [DeliveryController::class, 'index'])->name('index');
        Route::get('create', [DeliveryController::class, 'create'])->name('create');
        Route::post('store', [DeliveryController::class, 'store'])->name('store');
        Route::get('edit/{id}', [DeliveryController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [DeliveryController::class, 'update'])->name('update');
        Route::post('delete', [DeliveryController::class, 'delete'])->name('delete');
        Route::post('bulk-delete', [DeliveryController::class, 'bulk_delete'])->name('bulk.delete');
    });

    // ANALYTICS
    Route::group(['as' => 'analytics.', 'prefix' => 'analytics/'], function () {
        Route::get('/', [AnalyticsController::class, 'index'])->name('index');
        Route::get('create', [AnalyticsController::class, 'create'])->name('create');
        Route::post('store', [AnalyticsController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AnalyticsController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [AnalyticsController::class, 'update'])->name('update');
        Route::post('delete', [AnalyticsController::class, 'delete'])->name('delete');
        Route::post('bulk-delete', [AnalyticsController::class, 'bulk_delete'])->name('bulk.delete');
    });

    // REPORTS
    Route::group(['as' => 'report.', 'prefix' => 'report/'], function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
        Route::get('create', [ReportController::class, 'create'])->name('create');
        Route::post('store', [ReportController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ReportController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [ReportController::class, 'update'])->name('update');
        Route::post('delete', [ReportController::class, 'delete'])->name('delete');
        Route::post('bulk-delete', [ReportController::class, 'bulk_delete'])->name('bulk.delete');
    });

    // Setting Routes
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('settings/store-or-update', [SettingController::class, 'storeOrUpdate'])->name('setting.store-or-update');

});

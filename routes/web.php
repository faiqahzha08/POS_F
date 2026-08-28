<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ItemPenjualanController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\JenisProdukController;
use App\Http\Controllers\ProfileController;


/*
|--------------------------------------------------------------------------
| Guest
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'index'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'auth'])
        ->name('login.post');

});


/*
|--------------------------------------------------------------------------
| Semua User yang sudah Login
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');


    /*
    |--------------------------------------------------------------------------
    | User Management
    | Admin Only
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        Route::get('/user', [UserController::class, 'index'])
            ->name('user.index');

        Route::get('/user/create', [UserController::class, 'create'])
            ->name('user.create');

        Route::post('/user/store', [UserController::class, 'store'])
            ->name('user.store');

        Route::get('/user/{user}/edit', [UserController::class, 'edit'])
            ->name('user.edit');

        Route::put('/user/{user}', [UserController::class, 'update'])
            ->name('user.update');

        Route::delete('/user/{user}', [UserController::class, 'destroy'])
            ->name('user.destroy');

    });


    /*
    |--------------------------------------------------------------------------
    | Produk, Distributor, Jenis Produk, Penjualan
    | Admin & Kasir
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin,kasir')->group(function () {


        /*
        |--------------------------------------------------------------------------
        | Produk
        |--------------------------------------------------------------------------
        */

        Route::resource('produk', ProdukController::class)
            ->parameters([
                'produk' => 'id'
            ]);


        /*
        |--------------------------------------------------------------------------
        | Distributor
        |--------------------------------------------------------------------------
        */

        Route::resource('distributor', DistributorController::class)
            ->except(['show']);


        /*
        |--------------------------------------------------------------------------
        | Jenis Produk
        |--------------------------------------------------------------------------
        */

        Route::resource('jenis-produk', JenisProdukController::class)
            ->except(['show']);


        /*
        |--------------------------------------------------------------------------
        | Penjualan
        |--------------------------------------------------------------------------
        */

        Route::resource('penjualan', PenjualanController::class)
            ->only([
                'index',
                'create',
                'store',
                'show',
                'destroy'
            ]);


        /*
        |--------------------------------------------------------------------------
        | Item Penjualan
        |--------------------------------------------------------------------------
        */

        Route::resource('itempenjualan', ItemPenjualanController::class);

    });

});
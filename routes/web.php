<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ThongkeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "index"]);
Route::group(
    ["prefix" => "/client"],
    function () {
        Route::get('/account/login', [AccountController::class, "index"]);
        Route::get('/menu/index', [MenuItemController::class, "index"]);
        Route::get('/menu/detail', [MenuItemController::class, "detail"]);
        Route::get('/cart', [CartController::class, "index"]);
        Route::get('/checkout', [OrderController::class, "index"]);
        Route::get('/history-order', [OrderController::class, "historyorder"]);

    });

Route::group(
    ["prefix" => "/admin"],
    function () {
        Route::get('/thong-ke', [ThongkeController::class, "index"]);
        Route::get('/user/index', [AccountController::class, "index"]);
        Route::get('/menu/index', [MenuItemController::class, "index"]);
        Route::get('/restaurant', [RestaurantController::class, "index"]);
        Route::get('/order', [OrderController::class, "index"]);
        Route::get('/history-order', [OrderController::class, "historyorder"]);
    }
);

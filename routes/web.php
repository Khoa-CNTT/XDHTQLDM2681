<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ThongkeController;
use App\Http\Controllers\Shipper\HomeShipperController;
use App\Http\Controllers\Shipper\AccountShipperController;
use App\Http\Controllers\Shipper\OrderShipperController;
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
Route::group(
    ["prefix" => "/shipper"],
    function(){
        Route::get('/home',[HomeShipperController::class,"homeshipper"]);
        Route::get('/login',[AccountShipperController::class,"loginshipper"]);
        Route::get('/order',[OrderShipperController::class,"ordershipper"]);
        Route::get('/order-history',[OrderShipperController::class,"orderhistoryshipper"]);
        Route::get('/order-history-detail',[OrderShipperController::class,"detailhistory"]);
    });
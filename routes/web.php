<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\facebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Restaurant\MenuController;
use App\Http\Controllers\Restaurant\ResRegister;
use App\Http\Controllers\Restaurant\RestaurantController as  SellController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ThongkeController;
use App\Http\Controllers\Shipper\HomeShipperController;
use App\Http\Controllers\Shipper\AccountShipperController;
use App\Http\Controllers\Shipper\OrderShipperController;
use App\Http\Controllers\Restaurant\ResRegisterController;
use App\Http\Controllers\Restaurant\RestaurantController as RestaurantRestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);

Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('/login/google/callback', 'handleGoogleCallback');
});

Route::get('auth/facebook', [facebookController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('login/facebook/callback', [facebookController::class, 'handleFacebookCallback']);

Route::post('/chatbot/ask', [ChatBotController::class, 'ask'])->name('chatbox');
Route::get('/account/login', [AccountController::class, "index"]);
Route::post("/account/actionlogin", [AccountController::class, "actionLogin"])->name("login");
Route::post("/account/register", [AccountController::class, "actionregister"])->name("register");
Route::get('/verify-otp', [AccountController::class, 'showOTPForm'])->name('verify.otp_client');
Route::post('/verify-otp', [AccountController::class, 'verifyOTP'])->name('verify.otp.submit_client');
Route::get('/account/logout', [AccountController::class, 'actionLogout'])->name('logout');



// Routes for Forget Password
Route::get('forget-password', [AccountController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [AccountController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [AccountController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [AccountController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//menu
Route::get('/menu/index', [MenuItemController::class, "index"])->name('menu.item.index');
Route::get('/menu/detail/{id}', [MenuItemController::class, 'detail'])->name('menu.item.detail');
Route::get('/menu-items/search', [MenuItemController::class, 'search'])->name('menu-items.search');
Route::get('/homeres/{id}', [MenuItemController::class, "homeres"])->name('restaurant.menu');

Route::group(
    ["prefix" => "/client",
    "middleware" => ['auth.custom']],
    function () {
        //giỏ hàng
        Route::get('/cart', [CartController::class, "index"])->name('cart.index');;
        Route::get('cart/add/{menuItemId}', [CartController::class, 'addToCart'])->name('cart.add');
        Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
        Route::delete('/cart/remove/{cartItemId}', [CartController::class, 'removeFromCart'])->name('cart.remove');
        Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');

        Route::get('/checkout', [OrderController::class, "index"]);
        Route::get('/history-order', [OrderController::class, "historyorder"]);
        //setting account
        Route::get('/dashboard', [AccountController::class, "dashboard"]);
        Route::get('/address', [AccountController::class, "address"]);
        Route::get('/information', [AccountController::class, "information"])->name('account.information');
        Route::post('/information/update', [AccountController::class, 'updateinformation'])->name('account.information.update');

    });

//admin
Route::group(
    ["prefix" => "/admin"],
    function () {
        Route::group(["prefix" => "/category"], function () {
            Route::get("/index", [AdminCategoryController::class, "index"])->name("index");
            Route::get("/data", [AdminCategoryController::class, "getdata"])->name("data");
            Route::post("/create", [AdminCategoryController::class, "create"])->name("create");
            Route::post("/changeStatus", [AdminCategoryController::class, "changeStatus"])->name("changeStatus");
            Route::get("/Edit", [AdminCategoryController::class, "Edit"])->name("Edit");
            Route::post("/Update", [AdminCategoryController::class, "update"])->name("Update");
            Route::post("/delete", [AdminCategoryController::class, "delete"])->name("delete");
            Route::post("/deleteAll", [AdminCategoryController::class, "destroyAll"])->name("deleteAll");
            Route::post("/checkSlug", [AdminCategoryController::class, "checkSlug"])->name("checkSlug");
        });
        Route::group(["prefix" => "/restaurant"], function () {
            Route::get("/index", [AdminRestaurantController::class, "index"])->name("index");
            // routes/web.php
            Route::patch('/approve/{id}', [AdminRestaurantController::class, 'approve'])->name('restaurant.approve');
        });
        Route::get('/thong-ke', [ThongkeController::class, "index"]);
        Route::get('/user/index', [AccountController::class, "index"]);
        Route::get('/menu/index', [MenuItemController::class, "index"]);
        Route::get('/restaurant', [RestaurantController::class, "index"]);
    }
);

//restaurant
Route::group(
    ["prefix" => "/restaurant"],
    function(){
        Route::get('/register',[ResRegisterController::class,"resRegister"]);
        Route::post('/register-restaurant', [SellController::class, 'store'])->name('restaurant.store');
        Route::get('/admin/restaurants', [SellController::class, 'pendingRestaurants'])->name('admin.restaurants');
        Route::resource('menu_items', MenuController::class);
    }

);

//shipper
Route::group(
    ["prefix" => "/shipper"],
    function(){
        Route::get('/home',[HomeShipperController::class,"homeshipper"]);

        Route::get('/verify-otp', [AccountShipperController::class, 'showOTPForm'])->name('verify.otp');
        Route::post('/verify-otp', [AccountShipperController::class, 'verifyOTP'])->name('verify.otp.submit');
        Route::get('/login',[AccountShipperController::class,"loginshipper"])->name('login.shipper');
        Route::get('/register', [AccountShipperController::class, "registershipper"]);
        Route::post('/actionregister', [AccountShipperController::class, "actionregistershipper"])->name("driver.register");
        Route::post('/actionlogin', [AccountShipperController::class, "actionloginshipper"]);


        Route::get('/order',[OrderShipperController::class,"ordershipper"]);
        Route::get('/order-history',[OrderShipperController::class,"orderhistoryshipper"]);
        Route::get('/order-history-detail',[OrderShipperController::class,"detailhistory"]);
    });

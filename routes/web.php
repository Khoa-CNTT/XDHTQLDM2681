<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Admin\MenuItemController as AdminMenuItemController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\facebookController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;


use App\Http\Controllers\Restaurant\DashboardController;
use App\Http\Controllers\Restaurant\MenuController;
use App\Http\Controllers\Restaurant\ResRegister;
use App\Http\Controllers\Restaurant\RestaurantController as  SellController;
use App\Http\Controllers\Restaurant\AccountController as  AccountRestaurantController;
use App\Http\Controllers\Restaurant\OrderController as  RestaurantorderController;
use App\Http\Controllers\RestaurantController;


use App\Http\Controllers\RoleController;
use App\Http\Controllers\ThongkeController;
use App\Http\Controllers\Shipper\HomeShipperController;
use App\Http\Controllers\Shipper\AccountShipperController;
use App\Http\Controllers\Shipper\OrderShipperController;
use App\Http\Controllers\Restaurant\ResRegisterController;
use App\Http\Controllers\Restaurant\RestaurantController as RestaurantRestaurantController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, "index"]);

Route::controller(GoogleController::class)->group(function () {
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('/login/google/callback', 'handleGoogleCallback');
});

Route::get('auth/facebook', [facebookController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('login/facebook/callback', [facebookController::class, 'handleFacebookCallback']);
//
Route::post('/chatbot/ask', [ChatBotController::class, 'ask'])->name('chatbox');
//chat thời gian thực
// Giao diện chat của khách hàng
Route::get('/chat/{restaurant_id}', [ChatBotController::class, 'chatWithRestaurant'])->name('chat.customer');

// Giao diện chat của nhà hàng
Route::get('/restaurant/chat', [ChatBotController::class, 'chatAsRestaurant'])->name('chat.restaurant');

Route::post('/chat/send', [ChatBotController::class, 'send']);


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
Route::get('/menu-items/category/{id}',[MenuItemController::class,'category'])->name('menu-items.category');
Route::get('/homeres/{id}', [MenuItemController::class, "homeres"])->name('restaurant.menu');
Route::get('/homeres/{id}/category/{category_id}', [MenuItemController::class, "homeres"])->name('restaurant.menu.category');


Route::get('/restaurants/nearby', [DriverController::class, 'getNearby']);
Route::get('/nearby', [DriverController::class, 'Nearby'])->name('nearby.index');





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
        Route::post('/checkout-order', [OrderController::class, 'checkout'])->name('checkout');

        Route::get('/history-order', [OrderController::class, "historyorder"]);
        //setting account
        Route::get('/dashboard', [AccountController::class, "dashboard"]);
        Route::get('/address', [AccountController::class, "address"]);
        Route::get('/information', [AccountController::class, "information"])->name('account.information');
        Route::post('/information/update', [AccountController::class, 'updateinformation'])->name('account.information.update');
        Route::post('/account/location/update', [AccountController::class, 'update'])->name('location.update');
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
        Route::group(["prefix" => "/food"], function () {
            Route::get("/index", [AdminMenuItemController::class, "index"])->name("index");
            Route::post('/approve-menu-item/{id}', [AdminMenuItemController::class, 'approve'])->name('menu_items.approve');

        });
        //crud roles
        Route::resource('roles', RoleController::class);
        //crud
        Route::resource('users', UserController::class);




        Route::group(["prefix" => "/restaurant"], function () {
            Route::get("/index", [AdminRestaurantController::class, "index"])->name("index");
            // routes/web.php
            Route::patch('/approve/{id}', [AdminRestaurantController::class, 'approve'])->name('restaurant.approve');
        });
        Route::get('/thong-ke', [ThongkeController::class, "index"]);
    }
);

//restaurant
Route::group(
    ["prefix" => "/restaurant"],
    function(){
        //thông tin nhà hàng
        Route::get('/info', [DashboardController::class, "getRestaurantInfo"])->name('restaurant.info');
        Route::get('/edit', [DashboardController::class, "EditRestaurantInfo"])->name('restaurant.edit');
        Route::put('/update-info', [DashboardController::class, 'updateRestaurantInfo'])->name('restaurant.update.info');
        Route::post('/restaurant/toggle-status', [DashboardController::class, 'toggleStatus'])->name('restaurant.toggle.status');


        // đăng ký nhà hàng
        Route::get('/register',[ResRegisterController::class,"resRegister"]);
        Route::post('/register-restaurant', [SellController::class, 'store'])->name('restaurant.store');
        Route::get('/admin/restaurants', [SellController::class, 'pendingRestaurants'])->name('admin.restaurants');
        //đăng nhập
        Route::get('/login', [AccountRestaurantController::class, "login"])->name('login.restaurant');
        Route::post('/actionlogin', [AccountRestaurantController::class, 'actionlogin'])->name('restaurant.actionlogin');

        //thêm món
        Route::resource('menu_items', MenuController::class);
        // nhận thông báo đơn hàng
        Route::get('/order', [RestaurantorderController::class, 'order'])->name('orders.index');
        Route::get('/orders/{id}', [RestaurantorderController::class, 'Vieworder'])->name('orders.show');
        Route::post('/order/{id}/accept', [RestaurantorderController::class, 'accept'])->name('restaurant.order.accept');
        Route::post('/order/{id}/reject', [RestaurantorderController::class, 'reject'])->name('restaurant.order.reject');
        Route::post('/order/{id}/ready', [RestaurantorderController::class, 'ready'])->name('restaurant.order.ready');
        Route::post('/order/{id}/shipping', [RestaurantorderController::class, 'shipping'])->name('restaurant.order.shipping');
    }

);
Route::post('/shipper/nearby', [HomeShipperController::class, 'getNearbyOrders'])->name('shipper.nearby');


//shipper
Route::group(
    ["prefix" => "/shipper"],
    function(){
        // web.php
        Route::post('/update-status', [HomeShipperController::class, 'updateStatus'])->name('shipper.update.status');

        Route::get('/home',[HomeShipperController::class,"homeshipper"]);
        //Route::get('/nearby', [HomeShipperController::class, "getNearbyOrders"]);

        Route::get('/verify-otp', [AccountShipperController::class, 'showOTPForm'])->name('verify.otp');
        Route::post('/verify-otp', [AccountShipperController::class, 'verifyOTP'])->name('verify.otp.submit');
        Route::get('/login',[AccountShipperController::class,"loginshipper"])->name('login.shipper');
        Route::get('/register', [AccountShipperController::class, "registershipper"]);
        Route::post('/actionregister', [AccountShipperController::class, "actionregistershipper"])->name("driver.register");
        Route::post('/actionlogin', [AccountShipperController::class, "actionloginshipper"])->name('shipper.login');
        Route::get('/logout-shipper', [AccountShipperController::class, "logoutshipper"])->name('shipper.logout');


        Route::get('/order',[OrderShipperController::class,"ordershipper"]);
        // routes/web.php hoặc routes/api.php
        Route::post('order/accept/{orderId}', [OrderShipperController::class, 'acceptOrder']);
        Route::post('order/cancel/{orderId}', [OrderShipperController::class, 'cancelOrder']);

        Route::get('/order-history',[OrderShipperController::class,"orderhistoryshipper"]);
        Route::get('/order-history-detail',[OrderShipperController::class,"detailhistory"]);
    });

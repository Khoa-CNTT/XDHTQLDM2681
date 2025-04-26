<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (env('APP_ENV') !== 'local') {
            URL::forceScheme('https');
        }

        // Lấy danh mục với các món ăn và nhà hàng tương ứng sử dụng eager loading
        $categories = Category::with(['menuItems.restaurant'])->get();

        // Cập nhật dữ liệu cho view 'Client.Share.header'
        View::composer('Client.Share.header', function ($view) use ($categories) {
            // Truyền dữ liệu categories đã eager load vào view
            $view->with('categories', $categories);
        });

        //chuyển trang
        $this->app['router']->aliasMiddleware('auth.custom', \App\Http\Middleware\CheckToken::class);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ratings', function (Blueprint $table) {
            // Xóa cột cust_driver_rating và cust_restaurant_rating
            $table->dropColumn(['cust_driver_rating', 'cust_restaurant_rating']);

            // Thêm cột rating chung
            $table->tinyInteger('rating')->nullable(); // Đánh giá tổng thể
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ratings', function (Blueprint $table) {
            // Thêm lại cột đã xóa nếu cần
            $table->tinyInteger('cust_driver_rating')->nullable();
            $table->tinyInteger('cust_restaurant_rating')->nullable();

            // Xóa cột rating
            $table->dropColumn('rating');
        });
    }
};

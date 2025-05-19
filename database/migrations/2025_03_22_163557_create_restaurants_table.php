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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tên shop
            $table->boolean('approved')->default(false); // Mặc định là chưa duyệt
            $table->bigInteger('PhoneNumber');
            $table->string('email')->unique(); // Email
            $table->boolean('status')->default(true); // Trạng thái hoạt động
            $table->time('start_time')->nullable(); // Giờ mở cửa
            $table->time('end_time')->nullable(); // Giờ đóng cửa
            $table->string('business_type'); // Loại hình kinh doanh
            $table->text('description')->nullable(); // Mô tả shop
            $table->string('logo')->nullable(); // Logo cửa hàng
            $table->string('business_license')->nullable(); // Giấy phép kinh doanh

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restaurants');
    }
};

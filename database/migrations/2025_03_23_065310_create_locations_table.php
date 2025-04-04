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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('City');        // Thành phố
            $table->string('District');    // Quận/Huyện
            $table->string('Ward');        // Phường/Xã
            $table->string('Address');     // Địa chỉ chi tiết
            $table->double('Latitude')->nullable();
            $table->double('Longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};

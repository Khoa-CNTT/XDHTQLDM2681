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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phonenumber')->nullable();
            $table->string('fullname');
            $table->string('address')->nullable();
            $table->string('avatar')->nullable();
            $table->string('dateofbirth')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('license_plate')->nullable(); // Biển số xe
            $table->string('id_card')->nullable(); // CMND/CCCD
            $table->enum('status', ['chờ duyệt', 'đã duyệt', 'từ chối'])->default('chờ duyệt'); // Trạng thái duyệt
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};

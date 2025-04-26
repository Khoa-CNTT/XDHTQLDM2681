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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('restaurant_id');
            $table->integer('driver_id');
            $table->decimal('total_amount', 10, 2);
            $table->boolean('is_payment')->default(false);
            $table->boolean('is_cancel')->default(false);
            $table->string('status')->default('xác nhận món');
            $table->datetime('order_date')->default(now());
            $table->datetime('delivery_date')->nullable();
            $table->double('delivery_fee')->default(0);
            $table->string('note')->nullable();
            $table->dateTime('requested_delivery_datetime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

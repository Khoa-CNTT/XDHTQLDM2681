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
        Schema::table('offers', function (Blueprint $table) {
            $table->enum('discount_type', ['percent', 'fixed'])
                ->default('fixed')
                ->after('discount_value') // tùy chỉnh vị trí cột
                ->comment('percent: giảm theo phần trăm, fixed: giảm số tiền cố định');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropColumn('discount_type');
        });
    }
};

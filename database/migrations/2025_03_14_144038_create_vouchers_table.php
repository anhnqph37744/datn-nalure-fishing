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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code', 255)->unique();
            $table->string('title', 255)->nullable();
            $table->enum('voucher_type', ['discount', 'freeship'])->default('discount');
            $table->decimal('value', 10, 2);
            $table->enum('discount_type', ['percent', 'amount'])->default('amount');
            $table->decimal('min_order_value', 10, 2)->nullable();
            $table->decimal('max_discount_value', 10, 2)->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->integer('limit')->default(1);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};

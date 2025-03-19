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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->double('price');
            $table->text('image')->nullable();
            $table->unsignedBigInteger('variant_id');
            $table->integer('quantity')->default(1);
            $table->double('total');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_user');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};

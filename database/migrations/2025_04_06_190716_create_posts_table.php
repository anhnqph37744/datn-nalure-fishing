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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_category_id')
                ->constrained()
                ->onDelete('cascade')
                ->comment('Khóa ngoại liên kết tới post_categories.id');
            $table->string('title')->comment('Tiêu đề bài viết');
            $table->string('slug')->unique()->comment('Slug bài viết dùng trong URL, duy nhất');
            $table->text('excerpt')->nullable()->comment('Trích đoạn mô tả ngắn, có thể để trống');
            $table->longText('content')->comment('Nội dung chính của bài viết');
            $table->string('thumbnail')->nullable()->comment('Ảnh đại diện bài viết, đường dẫn URL, có thể để trống');
            $table->enum('status', ['draft', 'published'])
                ->default('draft')
                ->comment('Trạng thái bài viết: draft (nháp), published (đã xuất bản)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};

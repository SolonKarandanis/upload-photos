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
        Schema::create('categories_posts', function (Blueprint $table) {
            $table->foreignId('category_id')
                ->references('id')
                ->on('categories')->onDelete('cascade');
            $table->foreignId('post_id')
                ->references('id')
                ->on('posts')->onDelete('cascade');
            $table->primary(['category_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_posts');
    }
};

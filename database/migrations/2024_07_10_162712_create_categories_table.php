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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100); // Tên danh mục
            $table->string('slug', 100); // Slug
            $table->integer('status')->default(1);
            $table->string('meta_keyword', 200)->nullable(); // SEO Meta Keywords
            $table->string('meta_title', 60)->nullable(); // SEO Meta Title
            $table->string('meta_description', 160)->nullable(); // SEO Meta Description
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade'); // Parent ID
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};

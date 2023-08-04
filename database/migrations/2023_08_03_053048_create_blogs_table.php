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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title',200);
            $table->string('slug',50)->unique();
            $table->string('excerpt',100)->nullable();
            $table->string('description',40000)->nullable();
            $table->string('image',100)->nullable();
            $table->unsignedBigInteger('author');
            $table->unsignedBigInteger('category');
            $table->string('seo_title',100)->nullable();
            $table->string('seo_image',100)->nullable();
            $table->string('meta_description',700)->nullable();
            $table->boolean('featured')->default(0);
            $table->boolean('index')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->foreign('author')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('category')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

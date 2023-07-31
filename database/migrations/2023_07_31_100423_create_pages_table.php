<?php

use Brick\Math\BigInteger;
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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('title',40)->nullable(false)->unique();
            $table->string('slug',40)->nullable(false)->unique();
            $table->string('description',50000)->nullable();
            $table->string('image',100)->nullable();
            $table->unsignedBigInteger('page_template');
            $table->string('seo_title',100)->nullable();
            $table->string('meta_description',100)->nullable();
            $table->boolean('published')->default(1)->nullable(false);
            $table->string('page_schema',2000)->nullable();
            $table->string('seo_image',100)->nullable();
            $table->boolean('indexed')->default(0)->nullable(false);
            $table->foreign('page_template')->references('id')->on('templates')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};

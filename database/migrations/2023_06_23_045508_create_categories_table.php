<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('cat_name',30)->unique()->nullable(false);
            $table->string('cat_slug',30)->unique()->nullable(false);
            $table->boolean('cat_status')->nullable(false)->default(1);
            $table->boolean('top_cat')->nullable(false);
            $table->boolean('has_child')->nullable(false)->default( 1);
            $table->string('cat_img',100);
            $table->string('cat_description',25000)->nullable();
            $table->string('seo_title',100)->nullable();
            $table->string('seo_image')->nullable();
            $table->string('meta_description',700)->nullable();
            $table->string('page_schema',4000)->nullable();
            $table->boolean('index')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};

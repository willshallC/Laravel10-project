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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',40)->unique()->nullable(false);
            $table->string('product_description',600);
            $table->unsignedInteger('product_price')->nullable(false);
            $table->string('product_img',40);
            $table->boolean('product_status')->nullable(false);
            $table->string('product_brand',30)->nullable(false);
            $table->string('product_link',50)->nullable(false);
            $table->unsignedBigInteger('fcid');
            $table->unsignedBigInteger('fscid');
            $table->foreign('fcid')->references('id')->on('categories');
            $table->foreign('fscid')->references('id')->on('sub_categories');
            // $table->foreign('fcid')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreign('fscid')->references('id')->on('sub_categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};

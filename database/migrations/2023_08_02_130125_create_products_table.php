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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name',40)->unique()->nullable(false);
            $table->string('product_description',1000);
            $table->decimal('product_price',7,2)->nullable(false);
            $table->string('product_img',100);
            $table->boolean('product_status')->nullable(false);
            $table->string('product_brand',30)->nullable(false);
            $table->string('product_link',50)->nullable(false);
            $table->unsignedBigInteger('product_retailer');
            $table->unsignedBigInteger('fcid');
            $table->unsignedBigInteger('fscid')->nullable();
            $table->unsignedBigInteger('fsccid')->nullable();
            $table->foreign('product_retailer')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('fcid')->references('id')->on('categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('fscid')->references('id')->on('sub_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('fsccid')->references('id')->on('sub_child_categories')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

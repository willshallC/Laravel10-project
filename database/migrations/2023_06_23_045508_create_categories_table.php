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
            $table->boolean('cat_status')->nullable(false)->default(1);
            $table->boolean('top_cat')->nullable(false);
            $table->boolean('has_child')->nullable(false)->default(1);
            $table->string('cat_img',100);
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

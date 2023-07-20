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
        Schema::create('sub_child_categories', function (Blueprint $table) {
            $table->id();
            $table->string('sub_child_name',40)->nullable(false)->unique();
            $table->string('sub_child_img',100)->nullable(false);
            $table->boolean('sub_status')->default(1)->nullable(false);
            $table->unsignedBigInteger('sub_parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_child_categories');
    }
};

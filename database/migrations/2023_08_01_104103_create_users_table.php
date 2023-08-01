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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',30);
            $table->string('last_name',30);
            $table->string('username',30)->unique();
            $table->string('email',40)->unique();
            $table->string('password',40);
            $table->unsignedBigInteger('role');
            $table->string('phone',13)->nullable();
            $table->string('address',50)->nullable();
            $table->string('slug',20);
            $table->string('logo',100)->nullable();
            $table->string('meta_title',200)->nullable();
            $table->string('meta_description',500)->nullable();
            $table->string('schema',5000)->nullable();
            $table->string('relation',100);
            $table->boolean('active')->default(1);
            $table->boolean('index')->default(0);
            $table->boolean('detail_page')->default(0);
            $table->string('feed_url',200); 
            $table->string('website',50);
            $table->boolean('feed_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

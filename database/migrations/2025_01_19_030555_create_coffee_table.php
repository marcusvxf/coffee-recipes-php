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
        Schema::create('coffee', function (Blueprint $table) {
            $table->id();
            $table->string("coffee_bean");
            $table->string("coffee_qtd");
            $table->string("brew_method");
            $table->string("grind_size");
            $table->string("water_temp")->nullable();
            $table->string("water_amount");
            $table->string("notes")->nullable();
            $table->string("rating")->nullable();
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee');
    }
};

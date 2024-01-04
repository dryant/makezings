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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('transaction_id');
            $table->string('review')->nullable();
            $table->integer('delivery_time')->nullable();
            $table->integer('print_quality')->nullable();
            $table->integer('price')->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');

            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};

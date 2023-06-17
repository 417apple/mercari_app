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

        Schema::create('main_categories', function (Blueprint $table) {
            $table->id();

            // ここにカラムを追加していく

            $table->timestamps();
        });

        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_category_id');

            // ここにカラムを追加していく

            $table->timestamps();

            $table->foreign('main_category_id')->references('id')->on('main_categories');
        });

        Schema::create('item_conditions', function (Blueprint $table) {
            $table->id();

            // ここにカラムを追加していく

            $table->timestamps();
        });

        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('item_condition_id');

            // ここにカラムを追加していく

            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users');
            $table->foreign('buyer_id')->references('id')->on('users');
            $table->foreign('sub_category_id')->references('id')->on('sub_categories');
            $table->foreign('item_condition_id')->references('id')->on('item_conditions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
        Schema::dropIfExists('item_conditions');
        Schema::dropIfExists('sub_categories');
        Schema::dropIfExists('main_categories');
    }
};

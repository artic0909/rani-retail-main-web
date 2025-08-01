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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('main_category_id');
            $table->string('sub_category_name');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('main_category_id')
                ->references('id')
                ->on('main_categories')
                ->onDelete('cascade');

            $table->unique(['main_category_id', 'sub_category_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};

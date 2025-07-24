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
            $table->unsignedBigInteger('sub_category_id');
            $table->string('product_name');
            $table->text('purchase_details')->nullable();
            $table->string('purchase_unit')->nullable();
            $table->string('unit_type')->nullable();
            $table->decimal('purchase_rate', 10, 4)->nullable();
            $table->decimal('transport_cost', 10, 4)->nullable();
            $table->json('field_values')->nullable(); // dynamic fields stored as JSON
            $table->timestamps();

            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
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

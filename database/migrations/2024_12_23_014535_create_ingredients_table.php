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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Ingredient name
            $table->text('description');  // Ingredient description
            $table->decimal('price', 8, 2);  // Ingredient price
            $table->unsignedBigInteger('supplier_id');  // Foreign key for supplier
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');  // Foreign key constraint
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
    }
};

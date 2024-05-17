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
        Schema::create('product_help_places', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->float('amount');

            $table->foreignId('product_id')->constrained(table: 'products');
            $table->foreignId('help_place_id')->constrained(table: 'help_places');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_help_places');
    }
};

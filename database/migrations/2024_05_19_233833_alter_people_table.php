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
        Schema::table('people', function (Blueprint $table) {
            $table->boolean('its_at_the_same_address');
            $table->string('shelter_state')->nullable()->change();
            $table->string('shelter_city')->nullable()->change();
            $table->string('shelter_location')->nullable()->change();
            $table->string('shelter_info')->nullable()->change();
            $table->string('shelter_street')->nullable()->change();
            $table->string('shelter_number')->nullable()->change();
            $table->string('shelter_neighborhood')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            //
        });
    }
};

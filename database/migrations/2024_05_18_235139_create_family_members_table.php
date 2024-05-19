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
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('person_id')->constrained(table: 'people');

            $table->string('cpf_or_nis');
            $table->string('civil_name');
            $table->string('relationship');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('occupation');
            $table->string('remuneration');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('family_members');
    }
};

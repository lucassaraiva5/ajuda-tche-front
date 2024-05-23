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
        Schema::table('family_members', function (Blueprint $table) {
            $table->string('cpf_nis_member')->nullable()->change();
            $table->string('civil_name_member')->nullable()->change();
            $table->string('relationship_member')->nullable()->change();
            $table->date('birth_date_member')->nullable()->change();
            $table->string('gender_member')->nullable()->change();
            $table->string('occupation_member')->nullable()->change();
            $table->string('remuneration_member')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

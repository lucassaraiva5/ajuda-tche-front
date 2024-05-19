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
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('cpf')->unique();
            $table->string('civil_name');
            $table->string('social_name')->nullable();
            $table->string('mother_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->string('occupation');
            $table->string('remuneration');
            $table->string('cell_phone');
            $table->string('email')->unique();
            $table->boolean('has_unique_registration');
            $table->string('nis_number')->nullable();
            $table->boolean('bolsa_familia_beneficiary');
            $table->boolean('volta_por_cima_beneficiary');
            $table->boolean('city_beneficiary');//Sao leo mais renda - Adicionei desta forma para ser mais dinamico
            $table->boolean('access_social_kitchen');
            $table->string('which_social_kitchen')->nullable();
            $table->boolean('has_disability');
            $table->string('disability_type')->nullable();

            $table->string('zip_code')->nullable();
            $table->string('street');
            $table->string('number');
            $table->string('complement')->nullable();
            $table->string('neighborhood');
            $table->string('state');
            $table->string('city');

            $table->string('shelter_state');
            $table->string('shelter_city');
            $table->string('shelter_location');
            $table->string('shelter_info');
            $table->string('shelter_street');
            $table->string('shelter_number');
            $table->string('shelter_complement')->nullable();
            $table->string('shelter_neighborhood');

            $table->string('declared_situation');
            $table->string('immediate_needs')->nullable();
            $table->string('other_immediate_needs')->nullable();
            $table->boolean('disabled_family_member');
            $table->string('family_member_disability_type')->nullable();

            $table->boolean('receives_bpc');
            $table->boolean('needs_healthcare');
            $table->string('who_needs_healthcare')->nullable();
            $table->boolean('uses_continuous_medication');
            $table->string('who_uses_continuous_medication')->nullable();
            $table->string('which_continuous_medications')->nullable();

            $table->string('housing_status');
            $table->string('others_housing_status')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};

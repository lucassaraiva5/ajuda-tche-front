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
            $table->string('cpf')->change();
            $table->string('civil_name')->change();
            $table->string('social_name')->nullable()->change();
            $table->string('mother_name')->nullable()->change();
            $table->date('birth_date')->change();
            $table->string('gender')->nullable()->change();
            $table->string('occupation')->nullable()->change();
            $table->string('remuneration')->nullable()->change();
            $table->string('cell_phone')->nullable()->change();
            $table->boolean('has_unique_registration')->nullable()->change();
            $table->string('nis_number')->nullable()->change();
            $table->boolean('bolsa_familia_beneficiary')->nullable()->change();
            $table->boolean('volta_por_cima_beneficiary')->nullable()->change();
            $table->boolean('city_beneficiary')->nullable()->change();
            $table->boolean('access_social_kitchen')->nullable()->change();
            $table->string('which_social_kitchen')->nullable()->change();
            $table->boolean('has_disability')->nullable()->change();
            $table->string('disability_type')->nullable()->change();

            $table->string('zip_code')->nullable()->change();
            $table->string('street')->change();
            $table->string('number')->change();
            $table->string('complement')->nullable()->change();
            $table->string('neighborhood')->change();
            $table->string('state')->change();
            $table->string('city')->change();

            $table->boolean('its_at_the_same_address')->nullable()->change();
            $table->string('shelter_state')->nullable()->change();
            $table->string('shelter_city')->nullable()->change();
            $table->string('shelter_location')->nullable()->change();
            $table->string('shelter_info')->nullable()->change();
            $table->string('shelter_street')->nullable()->change();
            $table->string('shelter_number')->nullable()->change();
            $table->string('shelter_complement')->nullable()->change();
            $table->string('shelter_neighborhood')->nullable()->change();

            $table->string('declared_situation')->nullable()->change();
            $table->string('immediate_needs')->nullable()->change();
            $table->string('other_immediate_needs')->nullable()->change();
            $table->boolean('disabled_family_member')->nullable()->change();
            $table->string('family_member_disability_type')->nullable()->change();

            $table->boolean('receives_bpc')->nullable()->change();
            $table->boolean('needs_healthcare')->nullable()->change();
            $table->string('who_needs_healthcare')->nullable()->change();
            $table->boolean('uses_continuous_medication')->nullable()->change();
            $table->string('who_uses_continuous_medication')->nullable()->change();
            $table->string('which_continuous_medications')->nullable()->change();

            $table->string('housing_status')->nullable()->change();
            $table->string('others_housing_status')->nullable()->change();
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

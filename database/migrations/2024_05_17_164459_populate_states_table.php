<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        
        DB::table('states')->insert(
            array(
                ['name' => 'Acre','uf' => 'AC'],
                ['name' => 'Alagoas','uf' => 'AL'],
                ['name' => 'Amapá','uf' => 'AP'],
                ['name' => 'Amazonas','uf' => 'AM'],
                ['name' => 'Bahia','uf' => 'BA'],
                ['name' => 'Ceará','uf' => 'CE'],
                ['name' => 'Distrito Federal','uf' => 'DF'],
                ['name' => 'Espírito Santo','uf' => 'ES'],
                ['name' => 'Goiás','uf' => 'GO'],
                ['name' => 'Maranhão','uf' => 'MA'],
                ['name' => 'Mato Grosso','uf' => 'MT'],
                ['name' => 'Mato Grosso do Sul','uf' => 'MS'],
                ['name' => 'Minas Gerais','uf' => 'MG'],
                ['name' => 'Pará','uf' => 'PA'],
                ['name' => 'Paraíba','uf' => 'PB'],
                ['name' => 'Paraná','uf' => 'PR'],
                ['name' => 'Pernambuco','uf' => 'PE'],
                ['name' => 'Piauí','uf' => 'PI'],
                ['name' => 'Rio de Janeiro','uf' => 'RJ'],
                ['name' => 'Rio Grande do Norte','uf' => 'RN'],
                ['name' => 'Rio Grande do Sul','uf' => 'RS'],
                ['name' => 'Rondônia','uf' => 'RO'],
                ['name' => 'Roraima','uf' => 'RR'],
                ['name' => 'Santa Catarina','uf' => 'SC'],
                ['name' => 'São Paulo','uf' => 'SP'],
                ['name' => 'Sergipe','uf' => 'SE'],
                ['name' => 'Tocantins','uf' => 'TO'],
            )
        );

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

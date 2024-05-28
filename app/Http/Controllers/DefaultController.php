<?php
 
namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\User;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
 
class DefaultController extends Controller
{
    public static function generateArray() {
        ini_set('memory_limit', '2048M');

        $peopleArray = [];
        $people = Person::with(['familyMembers' => function ($query) {
            //$query->where('updated_at', '>', '2024-05-25 18:46:43');
        }])
        //->where('updated_at', '>', '2024-05-25 18:46:43')
        ->get();
        
        foreach ($people as $person) {
            $personArray = [];

            $personArray["cpf_responsavel"] = $person->cpf;
            $personArray["nome_responsavel"] = $person->civil_name;
            $personArray["logradouro"] = $person->street;
            $personArray["numeracao"] = $person->number;
            $personArray["complemento"] =  $person->complement;
            $personArray["bairro"] = $person->neighborhood;
            $personArray["cep"] = $person->zip_code;
            $personArray["telefone_responsavel"] = $person->cell_phone;
            
            $i = 1;
            foreach ($person->familyMembers as $familyMember) {
                $nomeMembroIndex = "nome_membro_" . $i;
                $cpfMembroIndex = "cpf_membro_" . $i;
                $personArray[$nomeMembroIndex] = $familyMember->civil_name_member;
                $personArray[$cpfMembroIndex] = $familyMember->cpf_nis_member;
                $i++;
            }

            $peopleArray[] = $personArray;
        }

        $peopleArray;

        return Excel::download(new DataExport($peopleArray), 'users.xlsx');
    }
    public function export()
    {
        return DefaultController::generateArray();
    }
}
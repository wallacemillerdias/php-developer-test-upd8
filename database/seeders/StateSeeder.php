<?php

namespace Database\Seeders;

use App\Models\State;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            DB::table('clients')->delete();
            DB::table('cities')->delete();
            DB::table('states')->delete();
            $states = [
                ['name' => 'Rondônia', 'uf' => 'RO'],
                ['name' => 'Acre', 'uf' => 'AC'],
                ['name' => 'Amazonas', 'uf' => 'AM'],
                ['name' => 'Roraima', 'uf' => 'RR'],
                ['name' => 'Pará', 'uf' => 'PA'],
                ['name' => 'Amapá', 'uf' => 'AP'],
                ['name' => 'Tocantins', 'uf' => 'TO'],
                ['name' => 'Maranhão', 'uf' => 'MA'],
                ['name' => 'Piauí', 'uf' => 'PI'],
                ['name' => 'Ceará', 'uf' => 'CE'],
                ['name' => 'Rio Grande do Norte', 'uf' => 'RN'],
                ['name' => 'Paraíba', 'uf' => 'PB'],
                ['name' => 'Pernambuco', 'uf' => 'PE'],
                ['name' => 'Alagoas', 'uf' => 'AL'],
                ['name' => 'Sergipe', 'uf' => 'SE'],
                ['name' => 'Bahia', 'uf' => 'BA'],
                ['name' => 'Minas Gerais', 'uf' => 'MG'],
                ['name' => 'Espírito Santo', 'uf' => 'ES'],
                ['name' => 'Rio de Janeiro', 'uf' => 'RJ'],
                ['name' => 'Paraná', 'uf' => 'PR'],
                ['name' => 'Santa Catarina', 'uf' => 'SC'],
                ['name' => 'São Paulo', 'uf' => 'SP'],
                ['name' => 'Rio Grande do Sul', 'uf' => 'RS'],
                ['name' => 'Mato Grosso do Sul', 'uf' => 'MS'],
                ['name' => 'Mato Grosso	', 'uf' => 'MT'],
                ['name' => 'Goiás', 'uf' => 'GO'],
                ['name' => 'Distrito Federal', 'uf' => 'DF'],
            ];
            $count = (integer)count($states) - 1;
            foreach (range(0, $count) as $i) {
                $state = [
                    'name' => $states[$i]['name'],
                    'uf' => $states[$i]['uf']
                ];
                if (State::where('uf', $states[$i]['uf'])->count()) {
                    echo "Já existe o state de {$states[$i]['name']} cadastrado!\n";
                } else {
                    if (State::create($state)) {
                        echo "state (" . $i . "-" . $states[$i]['name'] . ") cadastrado com sucesso!\n";
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n\n";
            echo "Não foi possível adicionar | Codigo: ", $e->getCode(), "\n";
        }
    }
}

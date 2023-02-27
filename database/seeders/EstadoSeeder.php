<?php

namespace Database\Seeders;

use App\Models\Estado;
use Exception;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            DB::table('cidades')->delete();
            DB::table('estados')->delete();
            $estados = [
                ['nome' => 'Rondônia', 'uf' => 'RO'],
                ['nome' => 'Acre', 'uf' => 'AC'],
                ['nome' => 'Amazonas', 'uf' => 'AM'],
                ['nome' => 'Roraima', 'uf' => 'RR'],
                ['nome' => 'Pará', 'uf' => 'PA'],
                ['nome' => 'Amapá', 'uf' => 'AP'],
                ['nome' => 'Tocantins', 'uf' => 'TO'],
                ['nome' => 'Maranhão', 'uf' => 'MA'],
                ['nome' => 'Piauí', 'uf' => 'PI'],
                ['nome' => 'Ceará', 'uf' => 'CE'],
                ['nome' => 'Rio Grande do Norte', 'uf' => 'RN'],
                ['nome' => 'Paraíba', 'uf' => 'PB'],
                ['nome' => 'Pernambuco', 'uf' => 'PE'],
                ['nome' => 'Alagoas', 'uf' => 'AL'],
                ['nome' => 'Sergipe', 'uf' => 'SE'],
                ['nome' => 'Bahia', 'uf' => 'BA'],
                ['nome' => 'Minas Gerais', 'uf' => 'MG'],
                ['nome' => 'Espírito Santo', 'uf' => 'ES'],
                ['nome' => 'Rio de Janeiro', 'uf' => 'RJ'],
                ['nome' => 'Paraná', 'uf' => 'PR'],
                ['nome' => 'Santa Catarina', 'uf' => 'SC'],
                ['nome' => 'São Paulo', 'uf' => 'SP'],
                ['nome' => 'Rio Grande do Sul', 'uf' => 'RS'],
                ['nome' => 'Mato Grosso do Sul', 'uf' => 'MS'],
                ['nome' => 'Mato Grosso	', 'uf' => 'MT'],
                ['nome' => 'Goiás', 'uf' => 'GO'],
                ['nome' => 'Distrito Federal', 'uf' => 'DF'],
            ];
            $count = (integer)count($estados) - 1;
            foreach (range(0, $count) as $i) {
                $estado = [
                    'nome' => $estados[$i]['nome'],
                    'uf' => $estados[$i]['uf']
                ];
                if (Estado::where('uf', $estados[$i]['uf'])->count()) {
                    echo "Já existe o estado de {$estados[$i]['nome']} cadastrado!\n";
                } else {
                    if (Estado::create($estado)) {
                        echo "Estado (" . $i . "-" . $estados[$i]['nome'] . ") cadastrado com sucesso!\n";
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n\n";
            echo "Não foi possível adicionar | Codigo: ", $e->getCode(), "\n";
        }
    }
}

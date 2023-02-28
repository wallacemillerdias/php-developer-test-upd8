<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Client;
use App\Models\State;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Seeder;

Carbon::setLocale('pt_BR');

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = Carbon::createFromFormat('Y/m/d', '1986/10/23')->timestamp;
        $now = now();
        try {
            $state = State::where('uf', 'DF')->get();
            $cidade = City::where('name', 'Brasília')->get();
            if (isset($state[0]['id']) && isset($cidade[0]['id'])) {
                $client = [
                    'cpf' => '03941532458',
                    'name' => 'Usuário de Teste',
                    'birth_date' => $now,
                    'sex' => 'm',
                    'address' => 'Quadra 20 Lote 05 - Ocidental Parque',
                    'state_id' => $state[0]['id'],
                    'city_id' => $cidade[0]['id']
                ];
                Client::create($client);
                echo 'Usuário cadastrado com sucesso! ', "\n";
            }
        } catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n\n";
            echo "Não foi possível adicionar | Codigo: ", $e->getCode(), "\n";
        }
    }
}

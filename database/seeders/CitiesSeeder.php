<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesSeeder extends Seeder
{

    public function readCSV($csvFile, $array)
    {
        $file_handle = fopen($csvFile, 'r');
        while (!feof($file_handle)) {
            $line_of_text[] = fgetcsv($file_handle, 0, $array['delimiter']);
        }
        fclose($file_handle);
        return $line_of_text;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::table('cities')->delete();
            $csvFileName = "Lista_Municípios_com_IBGE_Brasil_Versao_CSV.csv";
            $csvFile = public_path('csv/' . $csvFileName);
            $row = $this->readCSV($csvFile, array('delimiter' => ','));
            $count = (integer)count($row);
            foreach (range(1, $count) as $i) {
                if (isset($row[$i][0])) {
                    $_row = $row[$i][0];
                    $uf = substr($_row, 0, 2);
                    $city = substr($_row, 2);
                    $city = explode(";", $city);
                    $state = State::where('uf', $uf)->get();
                    if (isset($state[0]['id'])) {
                        $payload = ['name' => utf8_encode($city[0]), 'state_id' => $state[0]['id']];
                        if (City::create($payload)) {
                            echo "Cidade (" . $i . "-" . $payload['name'] . ") cadastrada com sucesso!\n";
                        }
                    } else {
                        echo "Não foi possivel cadastrar a cidade (" . $i . "-" . $payload['name'] . ")\n";
                    }
                }
            }
        } catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n\n";
            echo "Não foi possível adicionar | Codigo: ", $e->getCode(), "\n";
        }
    }
}

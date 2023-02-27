<?php

namespace Database\Seeders;
use App\Models\Cliente;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Seeder;

Carbon::setLocale('pt_BR');

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        try {
//            \App\Models\User::factory()->create([
//                'name' => 'Wallace Miller',
//                'email' => 'wallacemiller823@gmail.com',
//            ]);
//            echo 'Usuário cadastrado com sucesso! ', "\n";
//        } catch (Exception $e){
//            echo 'Usuário já cadastrado ', "\n";
//            // echo $e->getMessage();
//        }

//        $table->id();
//        $table->string('cpf',11);
//        $table->string('nome',200);
//        $table->timestamp('data_nascimento');
//        $table->enum('sexo', ['m', 'f']);
//        $table->string('endereco', 200);
//        $table->unsignedBigInteger('estado_id');
//        $table->foreign('estado_id')->references('id')->on('estados');
//        $table->unsignedBigInteger('cidade_id');
//        $table->foreign('cidade_id')->references('id')->on('cidades');
//        $table->timestamps();

        $timestamp = Carbon::createFromFormat('Y/m/d', '1986/10/23')->timestamp;
        $now = now();
//
//        echo($timestamp);
//        exit();


        try {
            Cliente::factory()->create([
                'cpf' => '01951532458',
                'nome' => 'Wallace Miller',
                'data_nascimento' => $now,
                'sexo' => 'm',
                'endereco' => 'Quadra 20 Lote 05 - Ocidental Parque',
                'estado_id'=> 1,
                'cidade_id'=> 1
            ]);
            echo 'Usuário cadastrado com sucesso! ', "\n";
        } catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n\n";
            echo "Não foi possível adicionar | Codigo: ", $e->getCode(), "\n";
        }






    }
}

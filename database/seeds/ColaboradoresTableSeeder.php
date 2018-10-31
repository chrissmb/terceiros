<?php

use Illuminate\Database\Seeder;

class ColaboradoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colaboradores')->insert([
            'cpf' => '19989439095',
            'nome' => 'Mario Bros',
            'empresa_id' => 2,
            'validade_integracao' => '2019-02-10',
            'validade_exame' => '2019-01-15',
            'validade_nr20' => '2019-08-03',
            'proximo_exame' => '6 meses',
            'observacoes' => 'Adora cogumelos',
            'aceitante_pts' => 1,
        ]);
        DB::table('colaboradores')->insert([
            'cpf' => '03163481043',
            'nome' => 'Levi Ackerman',
            'empresa_id' => 3,
            'validade_integracao' => '2019-04-14',
            'validade_exame' => '2019-03-21',
            'validade_nr20' => '2019-10-11',
            'proximo_exame' => '1 ano',
            'observacoes' => null,
            'aceitante_pts' => 0,
        ]);
    }
}

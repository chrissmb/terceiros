<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'nome' => 'Capsule Corp',
        ]);
        DB::table('empresas')->insert([
            'nome' => 'Wayne Tech',
        ]);
        DB::table('empresas')->insert([
            'nome' => 'Umbrela Corp',
        ]);
    }
}

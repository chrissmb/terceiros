<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Christopher Monteiro',
            'username' => 'chris',
            'password' => Hash::make('teste123'),
        ]);
    }
}

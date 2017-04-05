<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; $i++)
        {
            DB::table('client')->insert([
                'nom' => str_random(10),
                'prenom' => str_random(10),
                'email' => str_random(10).'@gmail.com',
            ]);
        }
    }
}

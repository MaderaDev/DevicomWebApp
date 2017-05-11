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
        DB::table('client')->insert([
            'nom' => 'Coulonval',
            'prenom' => 'Benjamin',
            'email' => 'coulonval.benjamin@gmail.com',
            'civilite' => 'Monsieur'
        ]);
        for ($i = 1; $i <= 15; $i++)
        {
            DB::table('client')->insert([
                'nom' => str_random(10),
                'prenom' => str_random(10),
                'email' => str_random(10).'@gmail.com',
                'civilite' => 'Monsieur'
            ]);
        }
    }
}

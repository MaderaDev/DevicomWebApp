<?php

use Illuminate\Database\Seeder;

class FamilleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++)
        {
            DB::table('famille')->insert([
                'nom' => str_random(10),
            ]);
        }
    }
}

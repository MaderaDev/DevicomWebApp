<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 30; $i++)
        {
            DB::table('module')->insert([
                'nom' => 'Module'.$i
            ]);
        }
    }
}

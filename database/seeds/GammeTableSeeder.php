<?php

use Illuminate\Database\Seeder;

class GammeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Gamme1 =  [
            'nom' => 'Maisons modulaires écologiques'
        ];
        $Gamme2 =  [
            'nom' => 'Maisons modulaires traditionelles'
        ];
        $Gamme3 =  [
            'nom' => 'Maisons modulaires intelligentes'
        ];

        DB::table('gamme')->insert($Gamme1);
        DB::table('gamme')->insert($Gamme2);
        DB::table('gamme')->insert($Gamme3);
    }
}

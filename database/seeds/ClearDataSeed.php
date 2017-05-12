<?php

use Illuminate\Database\Seeder;

class ClearDataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('devis')->delete();
        DB::table('users')->delete();
        DB::table('client')->delete();
        DB::table('module_article')->delete();
        DB::table('module')->delete();
        DB::table('article')->delete();

    }
}

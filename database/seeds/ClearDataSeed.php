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
        DB::table('users')->delete();
    }
}

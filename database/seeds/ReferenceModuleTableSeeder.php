<?php

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Reference;

class ReferenceModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++)
        {
            DB::table('reference_module')->insert([
                'id_reference' => Reference::find(3)->id,
                'id_module' => Module::Where('nom', 'like', '%'.$i)->first()->id
            ]);App/Models/Reference::find(3);
        }
    }
}

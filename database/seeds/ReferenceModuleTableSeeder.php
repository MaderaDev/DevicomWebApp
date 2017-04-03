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
        for ($i = 1; $i <= 30; $i++)
        {
            DB::table('reference_module')->insert([
                'id_reference' => Reference::where('nom', 'StudioPack™')->first()->id,
                'id_module' => Module::Where('nom', 'Module'.$i)->first()->id
            ]);
        }
    }
}

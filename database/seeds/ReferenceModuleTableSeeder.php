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
            if(Module::Where('nom', 'like', '%'.$i)->first() != null or Reference::Where('nom', 'like', '%'.$i) != null) {
                DB::table('reference_module')->insert([
                    'id_reference' => Reference::Where('nom', 'like', '%'.$i)->first()->id,
                    'id_module' => Module::Where('nom', 'like', '%'.$i)->first()->id
                ]);
            }
        }
    }
}

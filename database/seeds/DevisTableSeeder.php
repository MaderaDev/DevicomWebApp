<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;

class DevisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');


        foreach (range(1,50) as  $key => $index) {
            $id = DB::table('devis')->insertGetId([
                'nom' => 'Devis n°'.$key,
                'montant' => $faker->randomFloat(2,40000, 250000),
                'id_utilisateur' => User::where('nom', 'Admin')->first()->id,
                'id_client' => Client::inRandomOrder()->get()->first()->id,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);

            $modules = \App\Models\Module::inRandomOrder()
                ->limit($faker->numberBetween(10,50))
                ->get();

            foreach($modules as $module) {
                DB::table('devis_module')->insert([
                    'quantite_module' => 1,
                    'id_devis' => $id,
                    'id_module' => $module->id,
                ]);
            }
        }

    }
}

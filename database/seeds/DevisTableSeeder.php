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
        for ($i = 1; $i <= 10; $i++)
        {
            DB::table('devis')->insert([
                'nom' => 'Devis'.$i,
                'montant' => $i,
                'id_utilisateur' => User::where('nom', 'Admin')->first()->id,
                'id_client' => Client::where('nom', 'Coulonval')->first()->id
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\Models\LigneProduit;

class ReferenceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Reference1 =  [
            'nom' => 'HouseFamily™',
            'id_ligne_produit' => LigneProduit::where('nom', 'Trad_Classiques')->first()->id
        ];
        $Reference2 =  [
            'nom' => 'DuoPack™',
            'id_ligne_produit' => LigneProduit::where('nom', 'Trad_Classiques')->first()->id
        ];
        $Reference3 =  [
            'nom' => 'StudioPack™',
            'id_ligne_produit' => LigneProduit::where('nom', 'Trad_Classiques')->first()->id
        ];

        DB::table('reference')->insert($Reference1);
        DB::table('reference')->insert($Reference2);
        DB::table('reference')->insert($Reference3);
    }
}

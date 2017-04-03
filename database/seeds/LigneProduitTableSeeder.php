<?php

use Illuminate\Database\Seeder;
use App\Models\Gamme;
class LigneProduitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $LigneProduit1 =  [
            'nom' => 'Eco_Classiques',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires écologiques')->first()->id
        ];
        $LigneProduit2 =  [
            'nom' => 'Eco_Mediums',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires écologiques')->first()->id
        ];
        $LigneProduit3 =  [
            'nom' => 'Eco_Premiums',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires écologiques')->first()->id
        ];
        $LigneProduit4 =  [
            'nom' => 'Trad_Classiques',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires traditionelles')->first()->id
        ];
        $LigneProduit5 =  [
            'nom' => 'Trad_Mediums',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires traditionelles')->first()->id
        ];
        $LigneProduit6 =  [
            'nom' => 'Trad_Premiums',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires traditionelles')->first()->id
        ];
        $LigneProduit7 =  [
            'nom' => 'Intel_Classiques',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires intelligentes')->first()->id
        ];
        $LigneProduit8 =  [
            'nom' => 'Intel_Mediums',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires intelligentes')->first()->id
        ];
        $LigneProduit9 =  [
            'nom' => 'Intel_Premiums',
            'id_gamme' => Gamme::where('nom', 'Maisons modulaires intelligentes')->first()->id
        ];

        DB::table('ligne_produit')->insert($LigneProduit1);
        DB::table('ligne_produit')->insert($LigneProduit2);
        DB::table('ligne_produit')->insert($LigneProduit3);
        DB::table('ligne_produit')->insert($LigneProduit4);
        DB::table('ligne_produit')->insert($LigneProduit5);
        DB::table('ligne_produit')->insert($LigneProduit6);
        DB::table('ligne_produit')->insert($LigneProduit7);
        DB::table('ligne_produit')->insert($LigneProduit8);
        DB::table('ligne_produit')->insert($LigneProduit9);
    }
}

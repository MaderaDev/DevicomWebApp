<?php

use Illuminate\Database\Seeder;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        foreach(range(1, 100) as $key => $index) {
            $moduleID = DB::table('module')->insertGetId([
                'nom' => 'Module n°'. $key,
                'prix' => $faker->randomFloat(2,100, 10000),
                'description' => 'Module#'.$key .' référence #'.$key
            ]);

            // Module Composant Article
            $articles = \App\Models\Article::inRandomOrder()
                ->limit($faker->numberBetween(10,100))
                ->get();

            foreach ($articles as $article) {
                DB::table('module_article')->insert([
                    'quantite_article' => 1,
                    'id_module'	 => $moduleID,
                    'id_article' => $article->id
                ]);
            }
        }
    }
}

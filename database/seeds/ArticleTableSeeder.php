<?php

use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        foreach (range(1,500) as  $key => $index) {
            DB::table('article')->insert([
                'nom' => 'Article '. $key,
                'fournisseur' => $faker->company,
                'reference' => 'REF#'.$key,
                'prix' =>  $faker->randomNumber(2),
                'status' => 1,
                'description' => $faker->text(100),
                'image' => NULL
            ]);
        }

    }
}

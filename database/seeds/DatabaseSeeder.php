<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ClearDataSeed::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(GammeTableSeeder::class);
        $this->call(LigneProduitTableSeeder::class);
        $this->call(ReferenceTableSeeder::class);
        $this->call(ModuleTableSeeder::class);
        $this->call(ReferenceModuleTableSeeder::class);
        $this->call(FamilleTableSeeder::class);
        $this->call(DevisTableSeeder::class);
        $this->call(ModuleTableSeeder::class);

    }
}

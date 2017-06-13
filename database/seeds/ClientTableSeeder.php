<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client')->insert([
            'civilite' => 'Monsieur',
            'nom' => 'Coulonval',
            'prenom' => 'Benjamin',
            'adresse' => '9 rue de la fontainre',
            'codepostal' => 38600,
            'ville' => 'fontaine',
            'email' => 'coulonval.benjamin@gmail.com',
            'telephone' => '0645896735',
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),

        ]);

        $faker = Faker\Factory::create('fr_FR');
        foreach (range(1,50) as  $key => $index) {

            $gender = $faker->randomElements(['male', 'female']);

            if($gender == 'male')
                $civilite = 'Monsieur';
            else
                $civilite = 'Madame';

            DB::table('client')->insert([
                'civilite' => $civilite,
                'nom' => $faker->name($gender),
                'prenom' => $faker->firstName,
                'adresse' => $faker->streetAddress,
                'codepostal' => str_replace(' ', '', $faker->postcode),
                'ville' => $faker->city,
                'email' => $faker->email,
                'telephone' => $faker->phoneNumber,
                'created_at' =>  \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ]);App\Models\Client::all();
        }
    }
}

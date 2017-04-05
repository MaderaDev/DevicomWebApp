<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->delete();
        $default_password = bcrypt('madera');
        $admin =  [
            'nom' => 'Admin',
            'prenom' => 'madera',
            'email' => 'admin@madera.fr',
            'password' => $default_password,
            'role'  => 'admin'
        ];
        $commercial =  [
            'nom' => 'Commercial',
            'prenom' => 'madera',
            'email' => 'commercial@madera.fr',
            'password' => $default_password,
            'role'  => 'commercial'
        ];
        $achat =  [
            'nom' => 'Achat',
            'prenom' => 'madera',
            'email' => 'achat@madera.fr',
            'password' => $default_password,
            'role'  => 'achat'
        ];
        $ingenieur =  [
            'nom' => 'Ingenieur',
            'prenom' => 'madera',
            'email' => 'ingenieur@madera.fr',
            'password' => $default_password,
            'role'  => 'ingenieur'
        ];

        DB::table('users')->insert($admin);
        DB::table('users')->insert($commercial);
        DB::table('users')->insert($achat);
        DB::table('users')->insert($ingenieur);
    }
}

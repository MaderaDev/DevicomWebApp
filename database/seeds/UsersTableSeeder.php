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
        $default_password = bcrypt('madera');
        $admin =  [
            'name' => 'Admin',
            'email' => 'admin@madera.fr',
            'password' => $default_password,
            'role'  => 'admin'
        ];
        $commercial =  [
            'name' => 'Commercial',
            'email' => 'commercial@madera.fr',
            'password' => $default_password,
            'role'  => 'commercial'
        ];
        $achat =  [
            'name' => 'Achat',
            'email' => 'achat@madera.fr',
            'password' => $default_password,
            'role'  => 'achat'
        ];
        $ingenieur =  [
            'name' => 'Ingenieur',
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

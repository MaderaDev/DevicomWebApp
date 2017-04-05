<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->string('nom', 50);
            $table
                ->string('prenom', 50);
            $table
                ->string('email', 50)
                ->unique();
            $table
                ->string('password', 255);
            $table
                ->timestamp('date_creation')
                ->nullable();
            $table
                ->enum('role', ['guest','achat', 'commercial', 'admin', 'ingenieur'])
                ->default('guest');
            $table
                ->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

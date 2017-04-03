<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table
                ->integer('id')
                ->unsigned()
                ->primary()
                ->increment()
                ->unique();
            $table
                ->string('nom', 50);
            $table
                ->string('prenom', 50);
            $table
                ->string('adresse', 50)
                ->nullable();
            $table
                ->int('codepostal', 4)
                ->nullable();
            $table
                ->string('ville', 50)
                ->nullable();
            $table
                ->string('email', 50);
            $table
                ->string('telephone', 50)
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client');
    }
}

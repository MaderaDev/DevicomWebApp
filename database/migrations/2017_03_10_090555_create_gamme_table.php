<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamme', function (Blueprint $table) {
            $table
                ->integer('id')
                ->primary()
                ->increment();
            $table
                ->string('nom', 50);
            $table
                ->string('description', 255);
            $table
                ->binary('image', 255);
            $table
                ->integer('id_reference')
                ->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_produit');
    }
}

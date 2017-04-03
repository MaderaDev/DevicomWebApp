<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLigneProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_produit', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->string('nom', 50);
            $table
                ->tinyInteger("status")
                ->default(0);
            $table
                ->text('description')
                ->nullable();
            $table
                ->binary('image')
                ->nullable();
            $table
                ->integer('id_gamme')
                ->unsigned();
/*            $table
                ->foreign('id_gamme')
                ->references('id')
                ->on('gamme');*/
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

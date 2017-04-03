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
                ->unsigned()
                ->primary()
                ->increment()
                ->unique();
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
                ->integer('id_ligne_produit')
                ->unsigned();
/*            $table
                ->foreign('id_ligne_produit')
                ->references('id')
                ->on('ligne_produit');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gamme');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference', function (Blueprint $table) {
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
        Schema::dropIfExists('reference');
    }
}

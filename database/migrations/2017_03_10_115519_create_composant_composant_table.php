<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposantComposantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composant_composant', function (Blueprint $table) {
            $table
                ->integer('id')
                ->primary()
                ->increment()
                ->unique();
            $table
                ->integer('quantite_sous_composant')
                ->default(1);
            $table
                ->integer('id_composant')
                ->unsigned();
/*            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');*/
            $table
                ->integer('id_sous_composant')
                ->unsigned();
/*            $table
                ->foreign('id_sous_composant')
                ->references('id')
                ->on('composant');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('composant_composant');
    }
}

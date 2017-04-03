<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposantFamilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composant_famille', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->integer('id_famille')
                ->unsigned();
/*            $table
                ->foreign('id_famille')
                ->references('id')
                ->on('famille');*/
            $table
                ->integer('id_composant')
                ->unsigned();
/*            $table
                ->foreign('id_composant')
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
        Schema::dropIfExists('composant_famille');
    }
}

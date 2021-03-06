<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleComposantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_composant', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->integer('quantite_composant')
                ->unsigned()
                ->default(1);
            $table
                ->integer('id_composant')
                ->unsigned();
/*            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');*/
            $table
                ->integer('id_module')
                ->unsigned();
/*            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_composant');
    }
}

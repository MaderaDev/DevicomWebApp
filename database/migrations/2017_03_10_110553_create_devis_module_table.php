<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevisModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis_module', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->integer('quantite_module')
                ->unsigned()
                ->default('1');
            $table
                ->integer('id_devis')
                ->unsigned();
/*            $table
                ->foreign('id_devis')
                ->references('id')
                ->on('devis');*/
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
        Schema::dropIfExists('devis_module');
    }
}

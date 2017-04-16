<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferenceModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reference_module', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->integer('id_reference')
                ->unsigned();
            $table
                ->integer('quantite_module')
                ->unsigned()
                ->default('1');
/*            $table
                ->foreign('id_reference')
                ->references('id')
                ->on('reference');*/
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
        Schema::dropIfExists('reference_module');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleFamilleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_famille', function (Blueprint $table) {
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
        Schema::dropIfExists('module_famille');
    }
}

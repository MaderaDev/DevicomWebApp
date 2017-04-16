<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_article', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->integer('quantite_article')
                ->unsigned()
                ->default(1);
            $table
                ->integer('id_module')
                ->unsigned();
/*            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');*/
            $table
                ->integer('id_article')
                ->unsigned();
/*            $table
                ->foreign('id_article')
                ->references('id')
                ->on('article');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('module_article');
    }
}

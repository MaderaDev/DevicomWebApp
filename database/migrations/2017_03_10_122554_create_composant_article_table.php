<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposantArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('composant_article', function (Blueprint $table) {
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
        Schema::dropIfExists('composant_article');
    }
}

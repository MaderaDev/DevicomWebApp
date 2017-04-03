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
        Schema::table('composant_article', function (Blueprint $table) {
            $table
                ->integer('id')
                ->primary()
                ->increment()
                ->unique();
            $table
                ->integer('quantite_composant')
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

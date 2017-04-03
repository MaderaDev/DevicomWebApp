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
        Schema::table('module_article', function (Blueprint $table) {
            $table
                ->integer('id')
                ->primary()
                ->increment()
                ->unique();
            $table
                ->integer('quantite_article')
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

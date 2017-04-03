<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->string('nom', 50);
            $table
                ->string('fournisseur', 50);
            $table
                ->string('reference', 50);
            $table
                ->float('prix')
                ->nullable();
            $table
                ->tinyInteger("status")
                ->default(1);
            $table
                ->text('description')
                ->nullable();
            $table
                ->binary('image')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}

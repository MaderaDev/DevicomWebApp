<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGammeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamme', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->string('nom', 50);
            $table
                ->tinyInteger("status")
                ->default(0);
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
        Schema::dropIfExists('gamme');
    }
}

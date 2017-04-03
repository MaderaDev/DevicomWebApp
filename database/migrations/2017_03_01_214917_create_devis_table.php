<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devis', function (Blueprint $table) {
            $table
                ->increments('id');
            $table
                ->string('nom', 50);
            $table
                ->float('montant')
                ->nullable();
            $table
                ->datetime('date_creation');
            $table
                ->datetime('date_modification');
            $table
                ->enum('status', ['Brouillon','En attente', 'Refusé', 'Accepté', 'En commande', 'En faturation', 'Clôturé'])
                ->default('Brouillon');
            $table
                ->integer('id_utilisateur')
                ->unsigned();
/*            $table
                ->foreign('id_utilisateur')
                ->references('id')
                ->on('users');*/
            $table
                ->integer('id_client')
                ->unsigned();
/*            $table
                ->foreign('id_client')
                ->references('id')
                ->on('client');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devis');
    }
}

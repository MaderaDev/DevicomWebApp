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
                ->default(0,0);
            $table
                ->float('solde')
                ->default(0,0);
            $table
                ->timestamps();
            $table
                ->enum('status', ['Brouillon','En attente', 'Refusé', 'Accepté', 'En commande', 'En facturation', 'Clôturé'])
                ->default('Brouillon');
            $table
                ->enum('etape', ['Devis_ouvert', 'Signature_devis', 'Permis_construire', 'Ouverture_chantier', 'Achevement_fondation', 'Achevement_mur', 'Achevement_etanche', 'Travaux_equipement', 'Remise_cle'])
                ->default('Devis_ouvert');
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

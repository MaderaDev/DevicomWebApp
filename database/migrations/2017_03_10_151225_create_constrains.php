<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstrains extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });

        Schema::table('devis', function (Blueprint $table) {
            $table
                ->foreign('id_client')
                ->references('id')
                ->on('client');
        });

        Schema::table('client', function (Blueprint $table) {
            //
        });

        Schema::table('gamme', function (Blueprint $table) {
            //
        });

        Schema::table('ligne_produit', function (Blueprint $table) {
            $table
                ->foreign('id_gamme')
                ->references('id')
                ->on('gamme');
        });

        Schema::table('reference', function (Blueprint $table) {
            $table
                ->foreign('id_ligne_produit')
                ->references('id')
                ->on('ligne_produit');
        });

        Schema::table('reference_module', function (Blueprint $table) {
            $table
                ->foreign('id_reference')
                ->references('id')
                ->on('reference');
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
        });

        Schema::table('module', function (Blueprint $table) {
            //
        });

        Schema::table('devis_module', function (Blueprint $table) {
            $table
                ->foreign('id_devis')
                ->references('id')
                ->on('devis');
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
        });

        Schema::table('module_famille', function (Blueprint $table) {
            $table
                ->foreign('id_famille')
                ->references('id')
                ->on('famille');
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
        });

        Schema::table('famille', function (Blueprint $table) {
            //
        });

        Schema::table('composant_famille', function (Blueprint $table) {
            $table
                ->foreign('id_famille')
                ->references('id')
                ->on('famille');
            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');
        });

        Schema::table('composant', function (Blueprint $table) {
            //
        });

        Schema::table('composant_composant', function (Blueprint $table) {
            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');
            $table
                ->foreign('id_sous_composant')
                ->references('id')
                ->on('composant');
        });

        Schema::table('article', function (Blueprint $table) {
            //
        });
        Schema::table('module_composant', function (Blueprint $table) {
            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
        });

        Schema::table('composant_article', function (Blueprint $table) {
            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');
            $table
                ->foreign('id_article')
                ->references('id')
                ->on('article');
        });

        Schema::table('module_article', function (Blueprint $table) {
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
            $table
                ->foreign('id_article')
                ->references('id')
                ->on('article');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

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
        Schema::update('users', function (Blueprint $table) {
            //
        });

        Schema::update('devis', function (Blueprint $table) {
            $table
                ->foreign('id_client')
                ->references('id')
                ->on('client');
        });

        Schema::update('client', function (Blueprint $table) {
            //
        });

        Schema::update('gamme', function (Blueprint $table) {
            $table
                ->foreign('id_ligne_produit')
                ->references('id')
                ->on('ligne_produit');
        });

        Schema::update('ligne_produit', function (Blueprint $table) {
            $table
                ->foreign('id_reference')
                ->references('id')
                ->on('reference');
        });

        Schema::update('reference', function (Blueprint $table) {
            //
        });

        Schema::update('reference_module', function (Blueprint $table) {
            $table
                ->foreign('id_reference')
                ->references('id')
                ->on('reference');
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
        });

        Schema::update('module', function (Blueprint $table) {
            //
        });

        Schema::update('devis_module', function (Blueprint $table) {
            $table
                ->foreign('id_devis')
                ->references('id')
                ->on('devis');
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
        });

        Schema::update('module_famille', function (Blueprint $table) {
            $table
                ->foreign('id_famille')
                ->references('id')
                ->on('famille');
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
        });

        Schema::update('famille', function (Blueprint $table) {
            //
        });

        Schema::update('composant_famille', function (Blueprint $table) {
            $table
                ->foreign('id_famille')
                ->references('id')
                ->on('famille');
            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');
        });

        Schema::update('composant', function (Blueprint $table) {
            //
        });

        Schema::update('composant_composant', function (Blueprint $table) {
            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');
            $table
                ->foreign('id_sous_composant')
                ->references('id')
                ->on('composant');
        });

        Schema::update('article', function (Blueprint $table) {
            //
        });

        Schema::update('module_composant', function (Blueprint $table) {
            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');
            $table
                ->foreign('id_module')
                ->references('id')
                ->on('module');
        });

        Schema::update('composant_article', function (Blueprint $table) {
            $table
                ->foreign('id_composant')
                ->references('id')
                ->on('composant');
            $table
                ->foreign('id_article')
                ->references('id')
                ->on('article');
        });

        Schema::update('module_article', function (Blueprint $table) {
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

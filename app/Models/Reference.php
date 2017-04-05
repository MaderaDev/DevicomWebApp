<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model {

    /**
     * Generated
     */

    protected $table = 'reference';
    protected $fillable = ['id', 'nom', 'status', 'description', 'image', 'id_ligne_produit'];


    public function ligneProduit() {
        return $this->belongsTo(\App\Models\LigneProduit::class, 'id_ligne_produit', 'id');
    }

    public function modules() {
        return $this->belongsToMany(\App\Models\Module::class, 'reference_module', 'id_reference', 'id_module');
    }

    public function referenceModules() {
        return $this->hasMany(\App\Models\ReferenceModule::class, 'id_reference', 'id');
    }


}

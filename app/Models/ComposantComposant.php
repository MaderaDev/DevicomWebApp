<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComposantComposant extends Model {

    /**
     * Generated
     */

    protected $table = 'composant_composant';
    protected $fillable = ['id', 'quantite_sous_composant', 'id_composant', 'id_sous_composant'];


    public function composant() {
        return $this->belongsTo(\App\Models\Composant::class, 'id_composant', 'id');
    }

    public function composant() {
        return $this->belongsTo(\App\Models\Composant::class, 'id_sous_composant', 'id');
    }


}

<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComposantFamille extends Model {

    /**
     * Generated
     */

    protected $table = 'composant_famille';
    protected $fillable = ['id', 'id_famille', 'id_composant'];


    public function composant() {
        return $this->belongsTo(\App\Models\Composant::class, 'id_composant', 'id');
    }

    public function famille() {
        return $this->belongsTo(\App\Models\Famille::class, 'id_famille', 'id');
    }


}

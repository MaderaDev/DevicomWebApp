<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Famille extends Model {

    /**
     * Generated
     */

    protected $table = 'famille';
    protected $fillable = ['id', 'nom'];


    public function composants() {
        return $this->belongsToMany(\App\Models\Composant::class, 'composant_famille', 'id_famille', 'id_composant');
    }

    public function modules() {
        return $this->belongsToMany(\App\Models\Module::class, 'module_famille', 'id_famille', 'id_module');
    }

    public function composantFamilles() {
        return $this->hasMany(\App\Models\ComposantFamille::class, 'id_famille', 'id');
    }

    public function moduleFamilles() {
        return $this->hasMany(\App\Models\ModuleFamille::class, 'id_famille', 'id');
    }


}

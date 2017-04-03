<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleComposant extends Model {

    /**
     * Generated
     */

    protected $table = 'module_composant';
    protected $fillable = ['id', 'quantite_composant', 'id_composant', 'id_module'];


    public function composant() {
        return $this->belongsTo(\App\Models\Composant::class, 'id_composant', 'id');
    }

    public function module() {
        return $this->belongsTo(\App\Models\Module::class, 'id_module', 'id');
    }


}

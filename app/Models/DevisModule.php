<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DevisModule extends Model {

    /**
     * Generated
     */

    protected $table = 'devis_module';
    protected $fillable = ['id', 'id_devis', 'id_module'];


    public function devi() {
        return $this->belongsTo(\App\Models\Devi::class, 'id_devis', 'id');
    }

    public function module() {
        return $this->belongsTo(\App\Models\Module::class, 'id_module', 'id');
    }


}

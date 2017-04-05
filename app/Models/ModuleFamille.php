<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleFamille extends Model {

    /**
     * Generated
     */

    protected $table = 'module_famille';
    protected $fillable = ['id', 'id_famille', 'id_module'];


    public function famille() {
        return $this->belongsTo(\App\Models\Famille::class, 'id_famille', 'id');
    }

    public function module() {
        return $this->belongsTo(\App\Models\Module::class, 'id_module', 'id');
    }


}

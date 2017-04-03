<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReferenceModule extends Model {

    /**
     * Generated
     */

    protected $table = 'reference_module';
    protected $fillable = ['id', 'id_reference', 'id_module'];


    public function module() {
        return $this->belongsTo(\App\Models\Module::class, 'id_module', 'id');
    }

    public function reference() {
        return $this->belongsTo(\App\Models\Reference::class, 'id_reference', 'id');
    }


}

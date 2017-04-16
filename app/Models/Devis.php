<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{

    /**
     * Generated
     */

    protected $table = 'devis';
    protected $fillable = [
        'id',
        'nom',
        'montant',
        'solde',
        'etape',
        'status',
        'id_utilisateur',
        'id_client'
    ];


    public function client()
    {
        return $this->belongsTo(\App\Models\Client::class, 'id_client', 'id');
    }

    public function modules()
    {
        return $this->belongsToMany(\App\Models\Module::class, 'devis_module', 'id_devis', 'id_module');
    }

    public function devisModules()
    {
        return $this->hasMany(\App\Models\DevisModule::class, 'id_devis', 'id');
    }


}

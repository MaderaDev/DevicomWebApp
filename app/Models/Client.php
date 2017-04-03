<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    /**
     * Generated
     */

    protected $table = 'client';
    protected $fillable = ['id', 'nom', 'prenom', 'adresse', 'codepostal', 'ville', 'email', 'telephone'];


    public function devis() {
        return $this->hasMany(\App\Models\Devi::class, 'id_client', 'id');
    }


}

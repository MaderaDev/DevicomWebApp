<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gamme extends Model {

    /**
     * Generated
     */

    protected $table = 'gamme';
    protected $fillable = ['id', 'nom', 'status', 'description', 'image'];


    public function ligneProduits() {
        return $this->hasMany(\App\Models\LigneProduit::class, 'id_gamme', 'id');
    }


}

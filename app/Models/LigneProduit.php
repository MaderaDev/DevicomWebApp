<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LigneProduit extends Model {

    /**
     * Generated
     */

    protected $table = 'ligne_produit';
    protected $fillable = ['id', 'nom', 'status', 'description', 'image', 'id_gamme'];


    public function gamme() {
        return $this->belongsTo(\App\Models\Gamme::class, 'id_gamme', 'id');
    }

    public function references() {
        return $this->hasMany(\App\Models\Reference::class, 'id_ligne_produit', 'id');
    }


}

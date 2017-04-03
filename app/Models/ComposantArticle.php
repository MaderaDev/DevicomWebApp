<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComposantArticle extends Model {

    /**
     * Generated
     */

    protected $table = 'composant_article';
    protected $fillable = ['id', 'quantite_composant', 'id_composant', 'id_article'];


    public function article() {
        return $this->belongsTo(\App\Models\Article::class, 'id_article', 'id');
    }

    public function composant() {
        return $this->belongsTo(\App\Models\Composant::class, 'id_composant', 'id');
    }


}

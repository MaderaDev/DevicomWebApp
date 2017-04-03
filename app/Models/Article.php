<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    /**
     * Generated
     */

    protected $table = 'article';
    protected $fillable = ['id', 'nom', 'fournisseur', 'reference', 'prix', 'status', 'description', 'image'];


    public function composants() {
        return $this->belongsToMany(\App\Models\Composant::class, 'composant_article', 'id_article', 'id_composant');
    }

    public function modules() {
        return $this->belongsToMany(\App\Models\Module::class, 'module_article', 'id_article', 'id_module');
    }

    public function composantArticles() {
        return $this->hasMany(\App\Models\ComposantArticle::class, 'id_article', 'id');
    }

    public function moduleArticles() {
        return $this->hasMany(\App\Models\ModuleArticle::class, 'id_article', 'id');
    }


}

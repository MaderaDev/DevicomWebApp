<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composant extends Model {

    /**
     * Generated
     */

    protected $table = 'composant';
    protected $fillable = ['id', 'nom', 'reference', 'prix', 'status', 'description', 'image'];


    public function articles() {
        return $this->belongsToMany(\App\Models\Article::class, 'composant_article', 'id_composant', 'id_article');
    }

    public function composants() {
        return $this->belongsToMany(\App\Models\Composant::class, 'composant_composant', 'id_composant', 'id_sous_composant');
    }

    public function composants() {
        return $this->belongsToMany(\App\Models\Composant::class, 'composant_composant', 'id_sous_composant', 'id_composant');
    }

    public function familles() {
        return $this->belongsToMany(\App\Models\Famille::class, 'composant_famille', 'id_composant', 'id_famille');
    }

    public function modules() {
        return $this->belongsToMany(\App\Models\Module::class, 'module_composant', 'id_composant', 'id_module');
    }

    public function composantArticles() {
        return $this->hasMany(\App\Models\ComposantArticle::class, 'id_composant', 'id');
    }

    public function composantComposants() {
        return $this->hasMany(\App\Models\ComposantComposant::class, 'id_composant', 'id');
    }

    public function composantComposants() {
        return $this->hasMany(\App\Models\ComposantComposant::class, 'id_sous_composant', 'id');
    }

    public function composantFamilles() {
        return $this->hasMany(\App\Models\ComposantFamille::class, 'id_composant', 'id');
    }

    public function moduleComposants() {
        return $this->hasMany(\App\Models\ModuleComposant::class, 'id_composant', 'id');
    }


}

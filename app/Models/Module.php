<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

    /**
     * Generated
     */

    protected $table = 'module';
    protected $fillable = ['id', 'nom', 'prix', 'status', 'description', 'image'];


    public function devis() {
        return $this->belongsToMany(\App\Models\Devi::class, 'devis_module', 'id_module', 'id_devis');
    }

    public function articles() {
        return $this->belongsToMany(\App\Models\Article::class, 'module_article', 'id_module', 'id_article');
    }

    public function composants() {
        return $this->belongsToMany(\App\Models\Composant::class, 'module_composant', 'id_module', 'id_composant');
    }

    public function familles() {
        return $this->belongsToMany(\App\Models\Famille::class, 'module_famille', 'id_module', 'id_famille');
    }

    public function references() {
        return $this->belongsToMany(\App\Models\Reference::class, 'reference_module', 'id_module', 'id_reference');
    }

    public function devisModules() {
        return $this->hasMany(\App\Models\DevisModule::class, 'id_module', 'id');
    }

    public function moduleArticles() {
        return $this->hasMany(\App\Models\ModuleArticle::class, 'id_module', 'id');
    }

    public function moduleComposants() {
        return $this->hasMany(\App\Models\ModuleComposant::class, 'id_module', 'id');
    }

    public function moduleFamilles() {
        return $this->hasMany(\App\Models\ModuleFamille::class, 'id_module', 'id');
    }

    public function referenceModules() {
        return $this->hasMany(\App\Models\ReferenceModule::class, 'id_module', 'id');
    }


}

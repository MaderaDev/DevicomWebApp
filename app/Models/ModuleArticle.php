<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModuleArticle extends Model {

    /**
     * Generated
     */

    protected $table = 'module_article';
    protected $fillable = ['id', 'quantite_article', 'id_module', 'id_article'];


    public function article() {
        return $this->belongsTo(\App\Models\Article::class, 'id_article', 'id');
    }

    public function module() {
        return $this->belongsTo(\App\Models\Module::class, 'id_module', 'id');
    }


}

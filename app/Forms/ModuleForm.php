<?php

namespace App\Forms;

use App\Models\Article;
use Kris\LaravelFormBuilder\Form;

class ModuleForm extends Form
{
    private $articles;

    public function __construct()
    {
        $articlesAll = Article::all();
        $this->articles = $articlesAll->pluck('nom', 'id');
    }

    public function buildForm()
    {
        if($this->model != null) {
            $articles = $this->model->articles()->get()->pluck('id');
        } else {
            $articles = null;
        }

        $this
            ->add('id', 'hidden')
            ->add('nom', 'text', ['rules' => 'required'])
            ->add('prix', 'text', ['rules' => 'required'])
            ->add('description', 'textarea', ['rules' => 'required'])
            ->add('articles', 'select', [
                'choices' => $this->articles->toArray(),
                'attr' => ['class' => 'form-control tagsMultiSelect', 'multiple' => "multiple"],
                'class' => 'tags multi',
                'selected' => function ($articles) {
                    if($articles != null) // Returns the array of short names from model relationship data
                        return array_pluck($articles, 'id');
                }
            ])
            ->add('status', 'select', [
                'choices' => [0 => 'Désactivé', 1 => 'Activé'],
                'selected' => 1,
                'rules' => 'required'
            ])
            ->add('submit', 'submit', ['label' => 'Sauvegarder']);
    }
}

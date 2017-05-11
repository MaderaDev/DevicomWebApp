<?php

namespace App\Http\Controllers;

use App\Forms\ModuleForm;
use App\Models\Module;
use App\Models\ModuleArticle;
use Illuminate\Http\Request;

use Kris\LaravelFormBuilder\FormBuilder;
use Kris\LaravelFormBuilder\FormBuilderTrait;

class ModuleController extends Controller
{
    use FormBuilderTrait;

    public function index()
    {
        $modules = Module::all();
        return view('modules', compact('modules'));
    }

    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\ModuleForm', [
            'method' => 'POST',
            'url' => route('modules.store')
        ]);

        return view('modules_create', compact('form'));
    }

    public function edit(FormBuilder $formBuilder, $id)
    {
        $module = Module::findOrFail($id);

        $form = $formBuilder->create('App\Forms\ModuleForm', [
            'method' => 'POST',
            'url' => route('modules.storeEdit'),
            'model' => $module,
        ]);

        return view('modules_create', compact('form'));
    }

    public function storeEdit(Request $request)
    {
        $form = $this->form(ModuleForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $module = Module::findOrFail($request->input('id'));


        $update = $module->update($request->all());

        ModuleArticle::where('id_module', $module->id)->delete();
        $articles = $request->input('articles');


        if(count($articles) > 0) {
            foreach ($articles as $article) {
                ModuleArticle::create([
                    'quantite_article' => 1,
                    'id_module' => $module->id,
                    'id_article' => $article
                ]);
            }
        }
        flash('Module modifié');

        return redirect()->back();
    }


    public function store(Request $request)
    {
        $form = $this->form(ModuleForm::class);

        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        $createModule = Module::create($request->all());

        $articles = $request->input('articles');
        if(count($articles) > 0) {
            foreach ($articles as $article) {
                ModuleArticle::create([
                    'quantite_article' => 1,
                    'id_module' => $createModule->id,
                    'id_article' => $article
                ]);
            }
        }

        flash('Module créee');

        return redirect()->route('modules');
    }
}

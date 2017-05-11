<?php

namespace App\Http\Controllers;

use App\Models\Gamme;
use App\Models\LigneProduit;
use App\Models\Reference;
use Illuminate\Http\Request;

class GammesController extends Controller
{
    public function show()
    {
        $gammes = Gamme::all();
        $lignesProduits = LigneProduit::all();
        $references = Reference::all();

        return view('gammes', compact('gammes', 'lignesProduits', 'references'));
    }

}

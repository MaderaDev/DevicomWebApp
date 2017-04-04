<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GammesController extends Controller
{
    public function show()
    {
        return view('gammes');
    }
}

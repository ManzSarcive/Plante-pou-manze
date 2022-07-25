<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Panier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PanierController extends Controller
{

    public function index()
    {
        $paniers= Panier::all();
        return view ('paniers.index', compact('paniers'));
    }

    public function show(Panier $paniers)
    {
        return view ('paniers.show', compact('paniers'));
    }
    
}

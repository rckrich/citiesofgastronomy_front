<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TastierLifeController extends Controller
{
    public function index()
    {
        return view('tastier_life.show');
    } 
}

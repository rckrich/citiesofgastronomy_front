<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitiativesController extends Controller
{
    public function index()
    {
        return view('initiatives.show');
    } 
}

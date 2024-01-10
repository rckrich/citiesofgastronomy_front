<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitiativesController extends Controller
{
    public function index()
    {

        return view('initiatives.show');
    }
    public function initiatives_new()
    {
        return view('initiatives.new');
    }
    public function initiatives_edit()
    {
        return view('initiatives.edit');
    }
}

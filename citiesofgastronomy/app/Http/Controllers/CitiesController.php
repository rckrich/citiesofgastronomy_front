<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function index()
    {
        return view('cities.show');
    } 
    public function cities_edit()
    {
        return view('cities.edit');
    } 
}

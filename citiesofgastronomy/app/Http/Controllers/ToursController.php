<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToursController extends Controller
{
    public function index()
    {
        return view('tours.show');
    } 
}

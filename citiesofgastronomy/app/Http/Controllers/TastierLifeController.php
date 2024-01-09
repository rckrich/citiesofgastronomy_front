<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TastierLifeController extends Controller
{
    public function index()
    {
        return view('tastier_life.show');
    } 

    public function recipe_new()
    {
        return view('tastier_life.new_recipe');
    } 
    public function recipe_edit()
    {
        return view('tastier_life.edit_recipe');
    } 
    public function chef_new()
    {
        return view('tastier_life.new_chef');
    } 
    public function chef_edit()
    {
        return view('tastier_life.edit_chef');
    } 

}









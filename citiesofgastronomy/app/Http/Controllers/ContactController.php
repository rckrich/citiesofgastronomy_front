<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact_new()
    {
        return view('contact.new');
    } 
    public function contact_edit()
    {
        return view('contact.edit');
    } 
}

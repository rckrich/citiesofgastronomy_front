<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    } 

    public function login()
    {
        return view('session.login');
    } 
    public function recover_password()
    {
        return view('session.recover_password');
    } 

    public function cities()
    {
        return view('admin.cities');
    }    
    public function initiatives()
    {
        return view('admin.initiatives');
    } 
 
    public function tastier_life()
    {
        return view('admin.tastier_life');
    }
    public function tours()
    {
        return view('admin.tours');
    } 
    public function about()
    {
        return view('admin.about');
    }
    public function contact()
    {
        return view('admin.contact');
    }    
    public function main()
    {
        return view('admin.main_site');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function newsletter()
    {
        return view('admin.newsletter');
    }

}

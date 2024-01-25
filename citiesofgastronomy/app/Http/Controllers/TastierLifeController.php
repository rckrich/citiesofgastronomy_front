<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TastierLifeController extends Controller
{
    public function index()
    {
        $url = config('app.apiUrl').'home';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        $res = json_decode( $data, true);
        //Log::info("DAtta Result-- ::");

        $inputs = [];
        $inputs["bannerAbout"] = $res["bannerAbout"];
        $inputs["bannerNumberAndStats"] = $res["bannerNumberAndStats"];
        //Log::info($inputs);
        $inputs["cityList"] = $res["cities"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];
        return view('tastier_life.show',$inputs);
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









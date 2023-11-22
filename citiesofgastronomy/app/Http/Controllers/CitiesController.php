<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CitiesController extends Controller
{
    public function index($id)
    {
        //Log::info("##hhhh");
        //Log::info(config('app.apiUrl'));
        $url = config('app.apiUrl').'cities/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        $inputs = [];
        $inputs["city"] = $res["cities"];
        $inputs["banner"] = $res["bannerCities"];
        $inputs["gallery"] = $res["gallery"];
        $inputs["links"] = $res["links"];
        return view('cities.show', $inputs);

    }
}

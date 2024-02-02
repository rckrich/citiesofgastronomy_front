<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class InitiativesController extends Controller
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
        return view('initiatives.show', $inputs);
    }
    public function initiatives_new()
    {
        $url = config('app.apiUrl').'initiatives/create';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN INITIATIVE ");
        //Log::info($res);

        $inputs = [];

        $inputs["citiesFilter"] = $res["citiesFilter"];
        $inputs["typeOfActivityFilter"] = $res["typeOfActivityFilter"];
        $inputs["TopicsFilter"] = $res["TopicsFilter"];
        $inputs["sdgFilter"] = $res["sdgFilter"];
        $inputs["ConnectionsToOtherFilter"] = $res["ConnectionsToOtherFilter"];

        return view('initiatives.new', $inputs);
    }
    public function initiatives_edit()
    {
        return view('initiatives.edit');
    }
    public function typeOfActivity_save(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("name");
        $dattaSend = [
            'id' => $id,
            'name' => $name
        ];

        $url = config('app.apiUrl').'typeOfActivity/store';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        //Log::info("TIMELINE SAVE ::");
        //Log::info($res);

        return $res;
    }


    public function topics_save(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("name");
        $dattaSend = [
            'id' => $id,
            'name' => $name
        ];

        $url = config('app.apiUrl').'topic/store';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("TOPICS SAVE ::");
        //Log::info($res);

        return $res;
    }



    public function sdg_save(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("name");
        $number = $request->input("number");
        $dattaSend = [
            'id' => $id,
            'name' => $name,
            'number' => $number
        ];

        $url = config('app.apiUrl').'sdg/store';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("SDG SAVE ::");
        //Log::info($res);

        return $res;
    }
}

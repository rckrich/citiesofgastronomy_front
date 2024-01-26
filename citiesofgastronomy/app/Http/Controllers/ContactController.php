<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function contact_new()
    {


        $url = config('app.apiUrl').'generalDatta';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CONTACT :: RESPONSE");
        Log::info($res);

        $inputs = [];
        $inputs["continents"] = $res["continents"];
        $inputs["SocialNetworkType"] = $res["social"];
        $inputs["cities"] = $res["cities"];

        return view('contact.new', $inputs);
    }
    public function contact_edit()
    {
        return view('contact.edit');
    }
    public function save()
    {
        $id = $request->input("id");
        $name = $request->input("data_name");
        $idCity = $request->input("data_city");
        $position = $request->input("data_position");

        $dattaSend = [
            'id' => $id,
            'name' => $name,
            'idCity' => $idCity,
            'position' => $position
        ];

        $url = config('app.apiUrl').'about/contact/save';
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
    }
}

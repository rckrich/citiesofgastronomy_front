<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AboutController extends Controller
{
    public function timelineFind($id)
    {

        $inputs = [];
        $inputs["banners"] = [];
        //Log::info("##hhhh");
        //Log::info(config('app.apiUrl'));
        $url = config('app.apiUrl').'about/timeline/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        if($data){
            $res = json_decode( $data, true);
            Log::info($res);
            Log::info( $res["timeline"] );
            $timeline = $res["timeline"];
        }else{
            $timeline = [];
        };

        return $timeline;

    }

    public function timelineSave(Request $request)
    {
        $id = $request->input("id");
        $title = $request->input("title");
        $link = $request->input("link");
        $startDate = $request->input("startDate");
        $endDate = $request->input("iendDate");
        $dattaSend = [
            'id' => $id,
            'title' => $title,
            'link' => $link,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];

        $url = config('app.apiUrl').'about/timeline/save/';
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


}

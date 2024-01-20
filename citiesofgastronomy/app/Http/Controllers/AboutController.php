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
        $endDate = $request->input("endDate");
        $dattaSend = [
            'id' => $id,
            'title' => $title,
            'link' => $link,
            'startDate' => $startDate,
            'endDate' => $endDate
        ];

        $url = config('app.apiUrl').'about/timeline/save';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("TIMELINE SAVE ::");
        Log::info($res);

        return $res;
    }

    public function faqFind($id)
    {

        $inputs = [];
        $inputs["banners"] = [];

        $url = config('app.apiUrl').'about/faq/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        if($data){
            $res = json_decode( $data, true);
            Log::info($res);
            Log::info( $res["faq"] );
            $faq = $res["faq"];
        }else{
            $faq = [];
        };

        return $faq;

    }



    public function faqSave(Request $request)
    {
        $id = $request->input("id");
        $faq = $request->input("faq");
        $answer = $request->input("answer");
        $dattaSend = [
            'id' => $id,
            'faq' => $faq,
            'answer' => $answer
        ];

        $url = config('app.apiUrl').'about/faq/save';
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



    public function aboutDel(Request $request)
    {

        Log::info("##DEL -->");
        $id = $request->input("id");
        $type = $request->input("type");
        $dattaSend = [
            'id' => $id,
            'type' => $type
        ];

        $url = config('app.apiUrl').'about/delete';
        Log::info($url);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("DELET RESPONSE ::");
        Log::info($res);

        return $res;
    }



}

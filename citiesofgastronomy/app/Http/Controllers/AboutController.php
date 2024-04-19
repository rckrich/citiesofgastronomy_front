<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Cookie;

class AboutController extends Controller
{
    public function timelineFind($id)
    {

        $inputs = [];
        $inputs["banners"] = [];
        //Log::info("##hhhh");
        //Log::info(config('app.apiUrl'));
        $access_token = Cookie::get('stoken');
        $headers = array('Authorization:Bearer '.$access_token);
        $url = config('app.apiUrl').'about/timeline/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);
        curl_close($curl);
        try{
            if($data){
                $res = json_decode( $data, true);
                Log::info($res);
                Log::info( $res["timeline"] );
                $timeline = $res["timeline"];
            }else{
                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };
        } catch ( \Exception $e ) {
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
        $res = json_encode( $res, true);

        return $res;

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
        $access_token = Cookie::get('stoken');
        $headers = array('Authorization:Bearer '.$access_token);
        $url = config('app.apiUrl').'about/timeline/save';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("TIMELINE SAVE ::");
        Log::info($res);
        if($res==''){
                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };
            $res = json_encode( $res, true );
        return $res;
    }

    public function faqFind($id)
    {

        $inputs = [];
        $inputs["banners"] = [];
        $access_token = Cookie::get('stoken');
        $headers = array('Authorization:Bearer '.$access_token);
        $url = config('app.apiUrl').'about/faq/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);
        curl_close($curl);

        try{
            if($data){
                $res = json_decode( $data, true);
                Log::info($res);
                Log::info( $res["faq"] );
                $faq = $res["faq"];
            }else{
                    $res = [];
                    $res["status"] = 401;
                    $res["message"] = "Unauthorized";
                };

        } catch ( \Exception $e ) {
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
        $res = json_encode( $res, true);

        return $res;

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


        $access_token = Cookie::get('stoken');
        $headers = array('Authorization:Bearer '.$access_token);
        $url = config('app.apiUrl').'about/faq/save';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        if($data==''){

            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";

        }else{

            $res = json_decode( $data, true);
        };
        $res = json_encode( $res, true );
        Log::info("TIMELINE SAVE ::");
        Log::info($res);
        if($res==null||$res=='null'){

            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
            $res = json_encode( $res, true );

        };

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
        $access_token = Cookie::get('stoken');
        $headers = array('Authorization:Bearer '.$access_token);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("DELET RESPONSE ::");
        Log::info($res);
        if($res==''){

            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        };
        $res = json_encode( $res, true);

        return $res;
    }



}

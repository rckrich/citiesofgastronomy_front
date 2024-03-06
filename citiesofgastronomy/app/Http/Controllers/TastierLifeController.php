<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


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
        $url = config('app.apiUrl').'generalDatta';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("NEW RECIPE :: RESPONSE");
        Log::info($res);

        $inputs = [];

        return view('tastier_life.new_recipe',$inputs);
    } 



    public function recipe_edit()
    {
        return view('tastier_life.edit_recipe');
    } 
    public function chef_new()
    {
        $url = config('app.apiUrl').'generalDatta';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("NEW CHEF :: RESPONSE");
        //Log::info($res);

        $inputs = [];
        $inputs["id"] = '';
        $inputs["data_name"] = '';
        $inputs["facebook_link"] = '';
        $inputs["twitter_link"] = '';
        $inputs["linkedin_link"] = '';
        $inputs["instagram_link"] = '';
        $inputs["tiktok_link"] = '';
        $inputs["youtube_link"] = '';

        return view('tastier_life.new_chef',$inputs);
    }     

    public function chef_edit($id)
    {
        $url = config('app.apiUrl').'chef/findChef/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res_dec = json_decode( $data, true);
        $res = $res_dec['chef'];
        Log::info("EDIT CHEF :: FIND");
        //Log::info($res);

        $inputs = [];
        $inputs["id"] = $id;
        $inputs["data_name"] = $res['name'];
        $inputs["facebook_link"] = '';
        $inputs["twitter_link"] = '';
        $inputs["linkedin_link"] = '';
        $inputs["instagram_link"] = '';
        $inputs["tiktok_link"] = '';
        $inputs["youtube_link"] = '';
        foreach ($res['social_network'] as $social){
            if($social){
                switch($social['idSocialNetworkType']){
                    case 1:
                        $inputs["facebook_link"] = $social['social_network'];
                        break;
                    case 2:
                        $inputs["twitter_link"] = $social['social_network'];
                        break;
                    case 3:
                        $inputs["linkedin_link"] = $social['social_network'];
                        break;
                    case 4:
                        $inputs["instagram_link"] = $social['social_network'];
                        break;
                    case 5:
                        $inputs["tiktok_link"] = $social['social_network'];
                        break;
                    case 6:
                        $inputs["youtube_link"] = $social['social_network'];
                        break;
                }
            }
        }

        return view('tastier_life.new_chef',$inputs);
    } 
    
    public function chef_save(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("data_name");
        $facebook = $request->input("facebook_link");
        $twitter = $request->input("twitter_link");
        $linkedin = $request->input("linkedin_link");
        $instagram = $request->input("instagram_link");
        $tiktok = $request->input("tiktok_link");
        $youtube = $request->input("youtube_link");

        $dattaSend = [
            'id' => $id,
            'name' => $name,
            'Facebok_link' => $facebook,
            'Twitter_link' => $twitter,
            'Linkedin_link' => $linkedin,
            'Instagram_link' => $instagram,
            'Tiktok_link' => $tiktok,
            'Youtube_link' => $youtube,
            'idSection' => 12 //indicates chefs on entity social_network
        ];

        $url = config('app.apiUrl').'chef/store';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CHEF STORE ::");
        //Log::info($res);
        return redirect( "admin/tastier_life?section=chefs&page=1" );
    }
    


}









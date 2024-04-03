<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class ToursController extends Controller
{
    public function index($id)
    {
        $url_home = config('app.apiUrl').'home';
        $curl_home = curl_init();
        curl_setopt($curl_home, CURLOPT_URL, $url_home);
        curl_setopt($curl_home, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_home, CURLOPT_HEADER, false);
        $data_home = curl_exec($curl_home);
        curl_close($curl_home);
        $res_home = json_decode( $data_home, true);

        $url = config('app.apiUrl').'tours/show/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        $res = json_decode( $data, true);
        Log::info("TOUR SHOW ::");
        //Log::info($res);

        $inputs = [];
        $inputs["SocialNetworkType"] = $res_home["SocialNetworkType"];
        $inputs["info"] = $res_home["info"];
        $inputs["bannerAbout"] = $res_home["bannerAbout"];

        $tour = $res['tour'][0];

        $inputs["id"] = $id;
        $inputs["name"] = $tour['name'];
        $inputs["photo"] = $tour['photo'];
        $inputs["agency"] = $tour['travelAgency'];
        $inputs["description"] = $tour['description'];
        $inputs["cityName"] = $tour['cityName'];
        $inputs["social_network"] = $tour['social_network'];
        $inputs["gallery"] = $res['gallery'];

        return view('tours.show',$inputs);
    }

    
    public function tour_new()
    {
        $url = config('app.apiUrl').'tours/create';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("NEW TOUR :: RESPONSE");
        //Log::info($res);

        $inputs = [];
        $inputs["id"] = '';
        $inputs["citiesList"] = $res['cities'];
        $inputs["name"] = '';
        $inputs["photo"] = '';
        $inputs["agency"] = '';
        $inputs["selectedCity"] = 'default';
        $inputs["description"] = '';
        $inputs["facebook_link"] = '';
        $inputs["twitter_link"] = '';
        $inputs["linkedin_link"] = '';
        $inputs["instagram_link"] = '';
        $inputs["tiktok_link"] = '';
        $inputs["youtube_link"] = '';
        $inputs["gallery"] = '';
        $inputs["socialType"] = $res['socialType'];

        
        return view('tours.new', $inputs);
    } 
    public function tour_edit($id)
    {

        $url = config('app.apiUrl').'tours/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("EDIT TOUR :: RESPONSE");
        Log::info($res);

        $tour = $res['tour'];

        $inputs = [];
        $inputs["id"] = $id;
        $inputs["citiesList"] = $res['cities'];
        $inputs["selectedCity"] = $tour['idCity']?$tour['idCity']:'default';
        $inputs["name"] = $tour['name'];
        $inputs["photo"] = $tour['photo'];
        $inputs["agency"] = $tour['travelAgency'];
        $inputs["description"] = $tour['description'];
        $inputs["facebook_link"] = '';
        $inputs["twitter_link"] = '';
        $inputs["linkedin_link"] = '';
        $inputs["instagram_link"] = '';
        $inputs["tiktok_link"] = '';
        $inputs["youtube_link"] = '';
        foreach ($res['toursSocialNetwork'] as $social){
            if($social){
                switch($social['id']){
                    case 1:
                        $inputs["facebook_link"] = $social['value'];
                        break;
                    case 2:
                        $inputs["twitter_link"] = $social['value'];
                        break;
                    case 3:
                        $inputs["tiktok_link"] = $social['value'];
                        break;
                    case 4:
                        $inputs["instagram_link"] = $social['value'];
                        break;
                    case 5:                        
                        $inputs["youtube_link"] = $social['value'];
                        break;
                    case 6:
                        $inputs["linkedin_link"] = $social['value'];
                        break;
                }
            }
        };
        $inputs["gallery"] = $res['gallery'];
        $inputs["socialType"] = $res['socialType'];


        return view('tours.new',$inputs);
    }  

    public function tour_save(Request $request){
        $id = $request->input("id");
        $name = $request->input("data_name");
        $city = $request->input("data_city");
        $agency = $request->input("data_agency");
        $description = $request->input("data_description");
        $facebook_link = $request->input("facebook_link");
        $twitter_link = $request->input("twitter_link");
        $linkedin_link = $request->input("linkedin_link");
        $instagram_link = $request->input("instagram_link");
        $tiktok_link = $request->input("tiktok_link");
        $youtube_link = $request->input("youtube_link");

        $file =  $request->file('photo');
        $photo='';
        if($file){
                    // You can store this but should validate it to avoid conflicts
                    $original_name = $file->getClientOriginalName();
                    // You can store this but should validate it to avoid conflicts
                    $extension = $file->getClientOriginalExtension();
                    // This would be used for the payload
                    $file_path = $file->getPathName();
                    $photo = new \CURLFile($file_path);
        };


        $dattaSend = [
            'id' => $id,
            'name' => $name,
            'photo' => $photo,
            'idCity' => $city,
            'description' => $description,
            'travelAgency' => $agency,
            'Facebok_link' => $facebook_link,
            'Twitter_link' => $twitter_link,            
            'Linkedin_link' => $linkedin_link,
            'Instagram_link' => $instagram_link,
            'Tiktok_link' => $tiktok_link,
            'Youtube_link' => $youtube_link,
            'idSection' => 9,
        ];

        ///////////////////////////////////////

        $cant_gallery =$request->input('cant_gallery');

        $dattaSend["cant_gallery"] = $cant_gallery;
        for($i = 1; $i < $cant_gallery;$i++){
            $id1 = 'image'.$i;
            $file =  $request->file($id1);
            $image='';
            if($file){
                //Log::info("Sr configura la imagen - ".$i);
                        // You can store this but should validate it to avoid conflicts
                        $original_name = $file->getClientOriginalName();

                        // You can store this but should validate it to avoid conflicts
                        $extension = $file->getClientOriginalExtension();

                        // This would be used for the payload
                        $file_path = $file->getPathName();

                        $image = new \CURLFile($file_path);
            };
            $dattaSend[$id1] = $image;
            $id1 = 'idImage'.$i;
            $idImage =  $request->input($id1);
            $dattaSend[$id1] = $idImage;
            $id1 = 'deleteImage'.$i;
            $deleteImage =  $request->input($id1);
            $dattaSend[$id1] = $deleteImage;
        };

        $url = config('app.apiUrl').'tours/store';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        //*/
        
        Log::info("NEW TOUR :: STORE");
        //Log::info($res);

        return $res;

    }

    public function tour_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        $url = config('app.apiUrl').'tours/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("TOUR DELETE ::");
        //Log::info($res);

        return $res;
    }
}

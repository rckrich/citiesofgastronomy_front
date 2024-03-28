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
        //Log::info($res);

        $inputs = [];
        $inputs["contact"] = ['id' => '', 'idCity'=>'', 'name'=>'',  'email'=>'', 'position'=>''];
        $inputs["contactSocialNetwork"] = [];
        $inputs["continents"] = $res["continents"];
        $inputs["SocialNetworkType"] = $res["social"];
        $inputs["cities"] = $res["cities"];
        $inputs["id"] = '';

        return view('contact.new', $inputs);
    }
    public function contact_edit($id)
    {
        $dattaSend = [
            'id' => $id
        ];
        $url = config('app.apiUrl').'contact/find';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CONTACT :: RESPONSE");
        //Log::info($res);

        $inputs = [];
        $inputs["contact"] = $res["contact"];
        $inputs["contactSocialNetwork"] = $res["contactSocialNetwork"];

        $inputs["continents"] = $res["continents"];
        $inputs["SocialNetworkType"] = $res["social"];
        $inputs["cities"] = $res["cities"];
        $inputs["id"] = $id;

        Log::info($res["contactSocialNetwork"]);
        //Log::info($res["social"]);
        //Log::info($res["contact"]);

        return view('contact.new', $inputs);
        //return view('contact.edit');
    }
    public function save(Request $request)
    {
        $id = $request->input("id");
        $name = $request->input("data_name");
        $email = $request->input("data_email");
        $idCity = $request->input("data_city");
        $position = $request->input("data_position");
        $linksTag = $request->input("linksTag");
        $idSection = $request->input("idSection");

        $dattaSend = [
            'id' => $id,
            'idOwner' => $id,
            'name' => $name,
            'email' => $email,
            'idCity' => $idCity,
            'position' => $position,
            'idSection' => $idSection
        ];

        $arrayTags = explode(",", $linksTag);

        for($i = 0; $i < count($arrayTags)  ; $i++){

            $idLink = $arrayTags[$i].'_link';
            $dattaSend[$idLink] = $request->input($idLink);
            //Instagram_link
        }

        $url = config('app.apiUrl').'contact/save';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        //Log::info("CONTACT SAVE ::");
        //Log::info($res);
        return redirect( "admin/contact" );
    }


    public function delete($id){
        $url = config('app.apiUrl').'contact/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        //*/

        //Log::info($data);

        if($data == ''){
            return redirect( "/admin/contact" )->with('error', 'There was an unexpected error, please try again');
        }else{
            return redirect( "/admin/contact" );
        };//*/


    }




}

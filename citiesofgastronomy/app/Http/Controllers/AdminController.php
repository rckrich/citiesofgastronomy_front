<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function login()
    {
        return view('session.login');
    }
    public function recover_password()
    {
        return view('session.recover_password');
    }

    public function cities()
    {

        $url = config('app.apiUrl').'cities';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);


        $inputs = [];
        $inputs["cityList"] = $res["cities"];
        $inputs["continents"] = $res["continents"];
        return view('admin.cities', $inputs);
    }
    public function citiesFind($id)
    {


        $idCity = $id;

        $url = config('app.apiUrl').'cities/find/'.$idCity;


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);


        return $res;
    }
    public function citiesSearch(Request $request)
    {
        $search_box = $request->input("search_box");
        $fields = array('search' => $search_box);
        $fields_string = http_build_query($fields);

        $url = config('app.apiUrl').'cities';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        $inputs = [];
        $inputs["cityList"] = $res["cities"];
        $inputs["continents"] = $res["continents"];
        return view('admin.cities', $inputs);
    }

    public function citiesStoreUpdate(Request $request)
    {

        $data_id = $request->input("data_id");

        $data_city = $request->input("data_city");
        $data_country = $request->input("data_country");
        $data_continent = $request->input("data_continent");
        $data_population = $request->input("data_population");
        $data_locations = $request->input("data_locations");
        $data_dyear = $request->input("data_dyear");

        //$data_photo = $request->data_photo;
        // Get the UploadedFile object
        $file =  $request->file('data_photo');
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
        if($data_id){
            $url = config('app.apiUrl').'citiesUpdate';
        }else{
            $url = config('app.apiUrl').'citiesStore';
        };
        Log::info($url);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'photo' => $photo,
            'id' => $data_id,
            'name' => $data_city,
            'country' => $data_country,
            'idContinent' => $data_continent,
            'population' => $data_population,
            'restaurantFoodStablishments' => $data_locations,
            'designationyear' => $data_dyear
        ] );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info(  $res["cities"]   );

        return redirect( "/admin/cities" );
    }

    public function citiesCompleteUpdate(Request $request)
    {

        $data_id = $request->input("data_id");

        $data_city = $request->input("data_city");
        $data_country = $request->input("data_country");
        $data_continent = $request->input("data_continent");
        $data_population = $request->input("data_population");
        $data_locations = $request->input("data_locations");
        $data_dyear = $request->input("data_dyear");
        $data_description = $request->input("data_description");

        //$data_photo = $request->data_photo;
        // Get the UploadedFile object
        $file =  $request->file('data_photo');
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


        $url = config('app.apiUrl').'citiesUpdateComplete';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'photo' => $photo,
            'id' => $data_id,
            'name' => $data_city,
            'country' => $data_country,
            'idContinent' => $data_continent,
            'population' => $data_population,
            'restaurantFoodStablishments' => $data_locations,
            'designationyear' => $data_dyear
        ] );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info(  $res["cities"]   );

        return redirect( "/admin/cities" );
    }

    public function initiatives()
    {
        return view('admin.initiatives');
    }

    public function tastier_life()
    {
        return view('admin.tastier_life');
    }
    public function tours()
    {
        return view('admin.tours');
    }
    public function about()
    {
        return view('admin.about');
    }
    public function contact()
    {
        return view('admin.contact');
    }
    public function main()
    {
        return view('admin.main_site');
    }
    public function users()
    {
        return view('admin.users');
    }
    public function newsletter()
    {
        return view('admin.newsletter');
    }

}

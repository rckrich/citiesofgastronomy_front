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



    public function cities(Request $request)
    {
        $page = $request->input("page");

        if(!$page){ $page=1;   };
        $st = $request->input("st");
        $search_box = $request->input("search_box");
        if($search_box){
            $fields = array('search' => $search_box, 'page' => $page);
        }else{
            $fields = array('page' => $page);
        };
        $fields_string = http_build_query($fields);

        $url = config('app.apiUrl').'cities/?'.$page;
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
        $inputs["citiesTotal"] = $res["tot"];
        $inputs["paginator"] = $res["paginator"];
        $inputs["cityList"] = $res["cities"];
        $inputs["continents"] = $res["continents"];
        $inputs["search_box"] = $search_box;
        $inputs["page"] = $page;
        $inputs["st"] = $st;
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

        //return redirect( "/admin/cities" );
        return redirect()->route('admin.cities',['st'=>'1']);
    }

    public function citiesCompleteUpdate(Request $request)
    {

        $data_id = $request->input("data_id");
        $completeInfo = $request->input("completeInfo");

        $data_city = $request->input("name");
        $data_country = $request->input("country");
        $data_continent = $request->input("idContinent");
        $data_population = $request->input("population");
        $data_locations = $request->input("restaurantFoodStablishments");
        $data_dyear = $request->input("data_dyear");
        $data_description = $request->input("description");

        //$data_photo = $request->data_photo;
        // Get the UploadedFile object
        $file =  $request->file('photo');
        $photo='';
        if($file){
            //Log::info("Sr configura la imagen");
                    // You can store this but should validate it to avoid conflicts
                    $original_name = $file->getClientOriginalName();

                    // You can store this but should validate it to avoid conflicts
                    $extension = $file->getClientOriginalExtension();

                    // This would be used for the payload
                    $file_path = $file->getPathName();

                    $photo = new \CURLFile($file_path);
        };


        $file =  $request->file('banner');
        $banner='';
        if($file){
            Log::info("Sr configura la imagen");
                    // You can store this but should validate it to avoid conflicts
                    $original_name = $file->getClientOriginalName();

                    // You can store this but should validate it to avoid conflicts
                    $extension = $file->getClientOriginalExtension();

                    // This would be used for the payload
                    $file_path = $file->getPathName();

                    $banner = new \CURLFile($file_path);
        };


        $arrPOST = [
            'photo' => $photo,
            'banner' => $banner,
            'completeInfo' => $completeInfo,
            'id' => $data_id,
            'name' => $data_city,
            'country' => $data_country,
            'idContinent' => $data_continent,
            'population' => $data_population,
            'restaurantFoodStablishments' => $data_locations,
            'designationyear' => $data_dyear,
            'description' => $data_description
        ];

        $cant_gallery =$request->input('cant_gallery');

        $arrPOST["cant_gallery"] = $cant_gallery;
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
            $arrPOST[$id1] = $image;
            $id1 = 'idImage'.$i;
            $idImage =  $request->input($id1);
            $arrPOST[$id1] = $idImage;
            $id1 = 'deleteImage'.$i;
            $deleteImage =  $request->input($id1);
            $arrPOST[$id1] = $deleteImage;
        };


        $cant_links =$request->input('cant_links');
        $arrPOST["cant_links"] = $cant_links;
        for($i = 1; $i < $cant_links + 1;$i++){
            $id1 = 'link'.$i;
            $link =  $request->input($id1);
            $arrPOST[$id1] = $link;
            $id1 = 'titleLink'.$i;
            $titleLink =  $request->input($id1);
            $arrPOST[$id1] = $titleLink;
            $id1 = 'idLink'.$i;
            $idLink =  $request->input($id1);
            $arrPOST[$id1] = $idLink;
            $id1 = 'deleteLink'.$i;
            $deleteLink =  $request->input($id1);
            $arrPOST[$id1] = $deleteLink;
        };

        Log::info($arrPOST);

        //*/
        $url = config('app.apiUrl').'cities/updateCompleteInfo/'.$data_id;
        Log::info("#La URL");
        Log::info($url);
        Log::info("-------------");

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $arrPOST );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info(  $res   );

        //return redirect( "/admin/cities" );
        return redirect()->route('admin.cities',['st'=>'1']);
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

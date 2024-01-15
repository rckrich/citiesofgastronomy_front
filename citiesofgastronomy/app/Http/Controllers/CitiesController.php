<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CitiesController extends Controller
{
    public function index($id)
    {

        $inputs = [];
        $inputs["banners"] = [];
        //Log::info("##hhhh");
        //Log::info(config('app.apiUrl'));
        $url = config('app.apiUrl').'cities/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        if($data){
            $res = json_decode( $data, true);

            $inputs["city"] = $res["cities"];
            $inputs["banners"] = $res["bannerCities"];
            $inputs["gallery"] = $res["gallery"];
            $inputs["links"] = $res["links"];
            $inputs["files"] = $res["files"];
            $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
            $inputs["info"] = $res["info"];
        }else{
            $inputs = array( "city" => []);
        };

        return view('cities.show', $inputs);

    }

    public function cities_edit($id)
    {
        $inputs = [];
        $inputs["banners"] = [];

        $url = config('app.apiUrl').'cities/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        if($data){
            $res = json_decode( $data, true);

            $inputs["id"] = $id;
            $inputs["city"] = $res["cities"];
            $inputs["banners"] = $res["bannerCities"];
            $inputs["gallery"] = $res["gallery"];
            $inputs["links"] = $res["links"];
            $inputs["files"] = $res["files"];
            $inputs["continents"] = $res["continents"];
        }else{
            $inputs = array( "city" => []);
        };
        return view('cities.edit', $inputs);
    }

    public function delete($id){
        $url = config('app.apiUrl').'cities/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);


        return redirect( "/admin/cities" );
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

        Log::info(  $res  );
        return json_encode($res );
        //return response() -> json( [ $res ], 200 );

        //return redirect( "/admin/cities" );
        //return redirect()->route('admin.cities',['st'=>'1']);
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

        //Log::info("la descripcion::");
        //Log::info($data_description);

        //$data_photo = $request->data_photo;
        // Get the UploadedFile object
        $file =  $request->file('logo');
        $logo='';
        if($file){
            //Log::info("Sr configura la imagen");
                    // You can store this but should validate it to avoid conflicts
                    $original_name = $file->getClientOriginalName();

                    // You can store this but should validate it to avoid conflicts
                    $extension = $file->getClientOriginalExtension();

                    // This would be used for the payload
                    $file_path = $file->getPathName();

                    $logo = new \CURLFile($file_path);
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
            'logo' => $logo,
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


        $cant_files =$request->input('cant_files');
        $arrPOST["cant_files"] = $cant_files;
        for($i = 1; $i < $cant_files + 1;$i++){
            $id1 = 'file'.$i;
            /*$file =  $request->file($id1);
            $archive='';
            if($file){
                //Log::info("Sr configura la archive - ".$i);
                        // You can store this but should validate it to avoid conflicts
                        $original_name = $file->getClientOriginalName();

                        // You can store this but should validate it to avoid conflicts
                        $extension = $file->getClientOriginalExtension();

                        // This would be used for the payload
                        $file_path = $file->getPathName();

                        $archive = new \CURLFile($file_path);
            };
            $arrPOST[$id1] = $archive;//*/

            $id1 = 'title'.$i;
            $id2 = 'titlefile'.$i;
            $titleLink =  $request->input($id2);
            $arrPOST[$id1] = $titleLink;
            $id1 = 'idFile'.$i;
            $idFile =  $request->input($id1);
            $arrPOST[$id1] = $idFile;
            $id1 = 'deleteFile'.$i;
            $deleteLink =  $request->input($id1);
            $arrPOST[$id1] = $deleteLink;
        };

        Log::info($arrPOST);

        //*/
        //$url = config('app.apiUrl').'cities/updateCompleteInfo/'.$data_id;
        //Log::info("#La URL");
        //Log::info($url);
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
}

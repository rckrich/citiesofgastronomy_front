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





    public function addPDF(Request $request){
        $idOwner =$request->input('idOwner');
        $idSection =$request->input('idSection');
        $title =$request->input('titlePDF');
        $idFileGral =  $request->input("idFileGral");
        $file =  $request->file("filePDF");
        $pdf='';
        if($file){
            //Log::info("Sr configura la imagen - ".$i);
                    // You can store this but should validate it to avoid conflicts
                    $original_name = $file->getClientOriginalName();

                    // You can store this but should validate it to avoid conflicts
                    $extension = $file->getClientOriginalExtension();

                    // This would be used for the payload
                    $file_path = $file->getPathName();

                    $pdf = new \CURLFile($file_path);
        };
        $arrPOST = [
            'id' => $idFileGral,
            'pdf' => $pdf,
            'title' => $title,
            'idOwner' => $idOwner,
            'idSection' => $idSection,
        ];


        $url = config('app.apiUrl').'addPDF/';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $arrPOST );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        return $data;
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

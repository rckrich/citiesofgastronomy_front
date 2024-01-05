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
        $inputs = [];
        $inputs["info"] = [];
        $inputs["bannerAbout"] = '';
        $inputs["bannerNumberAndStats"] = '';
        $inputs["bannerCities"] = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["About"] = [];
        $inputs["Initiatives"] = [];
        $inputs["Testier"] = [];
        $inputs["Tour"] = [];
        $inputs["Calendar"] = [];
        $inputs["Contact"] = [];

        $url = config('app.apiUrl').'mainSiteContent/home';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        Log::info("MAIN SITE :::. ");
        Log::info( $data );

        if($data){
            $res = json_decode( $data, true);
            $inputs["Contact"] = $res["Contact"];
            $inputs["Calendar"] = $res["Calendar"];
            $inputs["Tour"] = $res["Tour"];
            $inputs["Testier"] = $res["Testier"];
            $inputs["About"] = $res["About"];
            $inputs["Initiatives"] = $res["Initiatives"];
            $inputs["bannerAbout"] = $res["bannerAbout"];
            $inputs["bannerNumberAndStats"] = $res["bannerNumberAndStats"];
            $inputs["bannerCities"] = $res["bannerCities"];
            $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
            $inputs["info"] = $res["info"];

        };

        //Log::info($inputs);
        return view('admin.main_site', $inputs);
    }

    public function mainLinksSave(Request $request)
    {
        $idSection = $request->input("idSection");
        $idOwner = $request->input("idOwner");
        $linksTag = $request->input("linksTag");

        $dattaSend = [
            'idSection' => $idSection,
            'linksTag' => $linksTag,
            'idOwner' => $idOwner
        ];

        Log::info($linksTag);
        $arrayTags = explode(",", $linksTag);
        Log::info("arrayTags ::");
        Log::info($arrayTags);
        for($i = 0; $i < count($arrayTags)  ; $i++){
            Log::info($i.' ##');
            $idLink = $arrayTags[$i].'_link';
            $dattaSend[$idLink] = $request->input($idLink);
            //Instagram_link
        }

        $url = config('app.apiUrl').'mainSiteContent/linkStore';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info(  "#Main Content#"  );
        Log::info(  $res  );
        return json_encode($res );
    }

    public function mainClusterSave(Request $request)
    {
        $dattaSend = [];
        $indice = $request->input("indice");
        Log::info("Indice: ".$indice);
        $porciones = explode(",", $indice);
        for($i = 0; $i < count($porciones); $i++ ){
            $ya =$porciones[$i];
            $dattaSend[$ya] =  $request->input($ya);
        }

        $url = config('app.apiUrl').'mainSiteContent/clustersave';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info(  "#Main Content#"  );
        Log::info(  $res  );
        return json_encode($res );
    }

    public function mainBannerUp(Request $request)
    {
        $idSection = $request->input("idSection");
        $idOwner = $request->input("idOwner");
        $file =  $request->file('banner');
        $banner='';
        if($file){
                    // You can store this but should validate it to avoid conflicts
                    $original_name = $file->getClientOriginalName();
                    // You can store this but should validate it to avoid conflicts
                    $extension = $file->getClientOriginalExtension();
                    // This would be used for the payload
                    $file_path = $file->getPathName();
                    $banner = new \CURLFile($file_path);
        };

        $url = config('app.apiUrl').'banners/store';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'idSection' => $idSection,
            'banner' => $banner,
            'idOwner' => $idOwner
        ] );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info(  $res  );
        return json_encode($res );
    }

    public function mainBannerDelete(Request $request)
    {
        Log::info(  "##LLEGO al DELETE :::"   );
        $idBanner = $request->input("idBanner");

        $url = config('app.apiUrl').'banners/delete';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'idBanner' => $idBanner
        ] );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info(  $res  );
        return json_encode($res );
    }

    public function mainBannerChange(Request $request)
    {
        Log::info(  "##LLEGO al CHANGE :::"   );
        $idBanner = $request->input("idBanner");
        $file =  $request->file('banner');
        $banner='';
        if($file){
                    // You can store this but should validate it to avoid conflicts
                    $original_name = $file->getClientOriginalName();
                    // You can store this but should validate it to avoid conflicts
                    $extension = $file->getClientOriginalExtension();
                    // This would be used for the payload
                    $file_path = $file->getPathName();
                    $banner = new \CURLFile($file_path);
        };

        $url = config('app.apiUrl').'banners/update';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'idBanner' => $idBanner,
            'banner' => $banner
        ] );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info(  $res  );
        return json_encode($res );
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
    public function reset_password()
    {
        return view('session.reset_password');
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


        $url = config('app.apiUrl').'addPDF';

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

    public function initiatives(Request $request)
    {
        $page = $request->input("page");
        //Log::info("#PAGE: ".$page);

        if(!$page){ $page=1;   };
        $st = $request->input("st");
        $search_box = $request->input("search_box");

        $fields = array('search' => $search_box, 'page' => $page);
        $search_inputs = array(
            'actype' => 'default',
            'topic' => 'default',
            'sdg' => 'default',
            'connection' => 'default',
        );

        $fields_string = http_build_query($fields);
        //Log::info(config('app.apiUrl'));

        $url = config('app.apiUrl').'initiativesAdmin';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN INITIATIVE List");
        //Log::info($res);

        $inputs = [];
        $inputs["initiatives"] = $res["initiatives"];
        //Total de registros encontrados
        $inputs["total"] = $res["tot"];
        //Cantidad de paginas
        $inputs["paginator"] = $res["paginator"];
        //contenido del buscador
        $inputs["search_box"] = $search_box;
        //pagina en la que estamos
        $inputs["page"] = $page;
        $inputs["st"] = $st;

        //Seccion en la que nos encontramos (esta vacia en el caso de ser initiatives e = 'filters' para habilitar los filtros)
        $inputs["section"] = $request->input("section");
        //Subsecciones de los filtros los valores que puede tomar esto es: topics, sdg
        //si esta vacio se considera que esta en  "type of act" (falta definir el valor de conections to other)
        $inputs["sub"] = $request->input("sub");
        //campos de búsqueda por defecto vacíos
        $inputs["search_inputs"] = $search_inputs;
        
        $inputs["typeOfActivity"] = $res["typeOfActivity"];
        $inputs["Topics"] = $res["Topics"];
        $inputs["sdg"] = $res["sdg"];
        $inputs["ConnectionsToOther"] = $res["ConnectionsToOther"];
        //return view('admin.cities', $inputs);

        return view('admin.initiatives', $inputs);
    }

    public function tastier_life(Request $request)
    {

        $page = $request->input("page");
        $pageChef = $request->input("pageChef");
        //Log::info("#PAGE: ".$page.$pageChef);

        if(!$page){ $page=1;   };
        if(!$pageChef){ $pageChef=1;};

        $searchRecipe = '';
        $searchChef = '';
        $searchCAT = '';
        $section = $request->input("section");
        if($section == 'recipes'){$searchRecipe = $request->input("search_box_recipe");}
        if($section == 'chefs'){$searchChef = $request->input("search_box_chef");}
        if($section == 'cat'){$searchCAT = $request->input("search_box_cat");}

        $fields = array('searchRecipe' => $searchRecipe, 'searchChef' => $searchChef, 'searchCAT' => $searchCAT, 'page' => $page, 'pageChef' => $pageChef);
        $fields_string = http_build_query($fields);

        $url = config('app.apiUrl').'tastierLife';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN TastierLife List");
        //Log::info($res);

        $inputs = [];
        $inputs["search_box_recipe"] = $searchRecipe;
        $inputs["search_box_chef"] = $searchChef;
        $inputs["search_box_cat"] = $searchCAT;
        $inputs["page"] = $page;
        $inputs["pageChef"] = $pageChef;
        $inputs["section"] = $request->input("section");
        
        $inputs["tot"] = $res["tot"];
        $inputs["paginator"] = $res["paginator"];
        $inputs["totChefs"] = $res["totCHEF"];
        $inputs["paginatorChefs"] = $res["paginatorCHEF"];
        $inputs["recipes"] = $res["recipes"];
        $inputs["chefs"] = $res["chef"];
        $inputs["categories"] = $res["categories"];

        return view('admin.tastier_life',$inputs);
    }
    
    public function tours(Request $request)
    {
     
        $page = $request->input("page");
        //Log::info("#PAGE: ".$page);

        if(!$page){ $page=1;   };

       
        $search = $request->input("search_box");
        $fields = array('search' => $search, 'page' => $page);
        $fields_string = http_build_query($fields);

        $url = config('app.apiUrl').'toursAdmin';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN Tours List");
        //Log::info($res);

        $inputs = [];
        $inputs['tours'] = $res['tours'];
        $inputs['tot'] = $res['tot'];
        $inputs['paginator'] = $res['paginator'];
        $inputs['page'] = $page;
        $inputs['search_box'] = $search;

        return view('admin.tours',$inputs);
    }
    public function about(Request $request, $page = 1)
    {
        $page = $request->input("page");
        $pageFaq = $request->input("pagef");
        //Log::info("#PAGE FAQ :: ".$pageFaq);
        //Log::info(config('app.apiUrl'));

        if(!$page){ $page=1;   };

        $st = $request->input("st");
        $search_box = $request->input("search_box");
        $stFAQ = $request->input("stFAQ");
        $searchFaq = $request->input("search_boxFAQ");



        $fields = array(
            'page' => $page,
            'search' => $search_box,
            'pageFaq' => $pageFaq,
            'searchFaq' => $searchFaq);


        $fields_string = http_build_query($fields);

        $url = config('app.apiUrl').'about/timeline/list';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        $section = $request->input("section");

        $inputs = [];
        $inputs["timelineTotal"] = $res["tot"];
        $inputs["paginator"] = $res["paginator"];
        $inputs["timeline"] = $res["timeline"];
        $inputs["search_box"] = $search_box;
        $inputs["page"] = $page;
        $inputs["section"] = $section;
        $inputs["faq"] = $res["faq"];
        $inputs["pageFaq"] = $res["pageFaq"];
        $inputs["totFAQ"] = $res["totFAQ"];
        $inputs["paginatorFAQ"] = $res["paginatorFAQ"];
        $inputs["searchFaq"] = $searchFaq;
        $inputs["st"] = $st;
        $inputs["stFAQ"] = $stFAQ;
        return view('admin.about', $inputs);
    }

    public function contact(Request $request)
    {
        $page = $request->input("page");
        Log::info("#PAGE: ".$page);

        if(!$page){ $page=1;   };
        $st = $request->input("st");
        $search_box = $request->input("search_box");

        $fields = array('search' => $search_box, 'page' => $page);

        $fields_string = http_build_query($fields);

        $url = config('app.apiUrl').'adminContacts';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN Contact List");
        //Log::info($res);

        $inputs = [];
        $inputs["total"] = $res["tot"];
        $inputs["paginator"] = $res["paginator"];
        $inputs["list"] = $res["contact"];
        $inputs["search_box"] = $search_box;
        $inputs["page"] = $page;
        $inputs["st"] = $st;
        //return view('admin.cities', $inputs);

        return view('admin.contact', $inputs);
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


    public function users(Request $request)
    {
        $page = $request->input("page");
        //Log::info("#PAGE: ".$page);

        if(!$page){ $page=1;   };

       
        $search = $request->input("search_box");
        $fields = array('search' => $search, 'page' => $page);
        $fields_string = http_build_query($fields);

        $url = config('app.apiUrl').'user';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN Tours List");
        Log::info($res);

        $inputs = [];
        $inputs['users'] = $res['Users'];
        $inputs['tot'] = $res['tot'];
        $inputs['paginator'] = $res['paginator'];
        $inputs['page'] = $page;
        $inputs['search_box'] = $search;

        return view('admin.users',$inputs);
    }
    public function users_save(Request $request){
        $id = $request->input("id");
        $name = $request->input("name");
        $email = $request->input("email");
        $dattaSend = [
            'id' => $id,
            'name' => $name,
            'email' => $email
        ];

        $url = config('app.apiUrl').'user/store';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("USER SAVE ::");
        Log::info($res);

        return $res;

    }


    public function newsletter(Request $request)
    {
        $page = $request->input("page");
        Log::info($page." <--page");

        if(!$page){ $page=1;   };

        $url = config('app.apiUrl').'newsletterAdmin?page='.$page;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        //Log::info("Newsletter :::");
        //Log::info($res);

        $inputs = [];
        $inputs["total"] = $res["total"];
        $inputs["paginator"] = $res["paginator"];
        $inputs["maillist"] = $res["maillist"];
        $inputs["page"] = $page;
        return view('admin.newsletter', $inputs);
    }
    public function newsletterDownloadVerify(Request $request)
    {
        $data_startdate = $request->input("data_startdate");
        $data_enddate = $request->input("data_enddate");

        $url = config('app.apiUrl').'newsletter/DownloadVerify';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, [
            'data_startdate' => $data_startdate,
            'data_enddate' => $data_enddate
        ] );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("Newsletter :::");
        //Log::info($res);
        //$newsList = $res["newsletter"];
        //print_r( $res );
        //return Excel::download($res, 'Newletter.csv', \Maatwebsite\Excel\Excel::CSV);
        //////////////////////////////////////////////////
        $inputs = [];
        //$inputs["total"] = $res["total"];
        return $data;

        //return view('admin.newsletter', $inputs);
    }

}

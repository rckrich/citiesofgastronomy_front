<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function message()
    {
        return view('message');
    }

    public function login()
    {
        /////////////VALIDAR AUTORIZACION
        $dattaSend = [];
        $access_token = Cookie::get('stoken');
        $headers = array(
            'Authorization:Bearer '.$access_token
        );

        $loggedin = 200;

        try{
            $url = config('app.apiUrl').'routeValidate';
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

            //Log::info($res);
            if($res["status"] != 200){
                $loggedin = 401;
            };
        } catch ( \Exception $e ) {
            //$route = $this->noLoginFind();
            //return redirect()->route($route);
            Log::info("no autorizado  ::");
            $loggedin = 401;
        }
        ///////////////////////////////
        if($loggedin == 200){
            return redirect()->route('admin.cities');
        }else{
            return view('session.login');
        }
    }

    public function noLoginFind(){
        return 'landing.index';
    }

    public function doLogin(Request $request)
    {
        $email = $request->input("data_user");
        $password = $request->input("data_password");
        $dattaSend = ['email' => $email , 'password' => $password];

        $url = config('app.apiUrl').'login';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("USER - LOGIN ::");
        Log::info($res);
        $input = [];
        $input["message"] = $res["message"];
        $input["status"] = $res["status"];

        if($res["status"] == 200){
            $minutos = '525600';//un AÑO
            //$nueva_cookie = $request->cookie('stoken', $res["token"], $minutos);// cookie('stoken', $res["token"], $minutos);

            Cookie::queue('stoken', $res["token"], 60 * 24 * 365);
            Cookie::queue('username', 'profile', 60 * 24 * 365); //eliminar esta y descomentar la otra
            //Cookie::queue('username', $res["username"], 60 * 24 * 365);

            //$nueva_cookie = cookie()->forever('stoken', 'mivalor');
            //Request::cookie('stoken');
        };
        return $input;
    }

    public function logout()
    {
        try{
            $access_token = Cookie::get('stoken');
            $headers = array(
                'Authorization:Bearer '.$access_token
            );

            $url = config('app.apiUrl').'logout';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            //curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
            $data = curl_exec($curl);
            curl_close($curl);

            $res = json_decode( $data, true);
        } catch ( \Exception $e ) {
                //$route = $this->noLoginFind();
                    //return redirect()->route($route);
        }
        return redirect()->route('admin.login');
    }
    public function reset_password()
    {
        return view('session.reset_password');
    }

    public function user_resetPassword(Request $request)
    {
        $email = $request->input("data_mail");
        $dattaSend = ['email' => $email ];

        $url = config('app.apiUrl').'user/forgotPassword';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("USER - SEND EMAIL TO RECOVER A USER PASSWORD ::");
        //Log::info($res);

        return $res;
    }

    public function show_resetPassword($token)
    {
        $inputs = [];
        $inputs['token'] = $token;
        return view('session.set_password',$inputs);
    }

    public function setPassword(Request $request){
        $email = $request->input("data_email");
        $password = $request->input("data_password");
        $passwordConfirmation = $request->input("confirm_password");
        $token = $request->input("access_token");
        $dattaSend = [
            'email' => $email,
            'password' => $password,
            'passwordConfirmation' => $passwordConfirmation,
            'token' => $token,
        ];

        $url = config('app.apiUrl').'user/resetPassword';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("SET USER PASSWORD ::");
        //Log::info($res);

        return $res;
    }

    public function show_changePassword()
    {
        $inputs = [];
        $stoken = Cookie::get('stoken');
        Log::info($stoken);

        if($stoken==="" || $stoken === null){
            return redirect()->route('admin.login');
        }
        else{
            //$inputs['stoken'] = $stoken;
            return view('session.change_password',$inputs);
        }
    }

    public function changePassword(Request $request)
    {
        $originalPassword = $request->input("original_password");
        $password = $request->input("data_password");
        $passwordConfirmation = $request->input("confirm_password");
        $access_token = Cookie::get('stoken');
        $dattaSend = [
            'originalPassword' => $originalPassword,
            'password' => $password,
            'passwordConfirmation' => $passwordConfirmation,
        ];
        $headers = array(
            'Authorization:Bearer '.$access_token
        );
        $url = config('app.apiUrl').'user/perfilPassword';
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
        Log::info("USER - PASSWORD CHANGED::");
        //Log::info($res);

        return $res;
    }

    public function cities(Request $request, $tipo = 'user')
    {
        $page = $request->input("page");
        $access_token = Cookie::get('stoken');

        if(!$page){ $page=1;   };
        $st = $request->input("st");
        $search_box = $request->input("search_box");
        if($search_box){
            $fields = array('search' => $search_box, 'page' => $page);
        }else{
            $fields = array('page' => $page);
        };
        $fields_string = http_build_query($fields);
        $headers = array(
            'Authorization:Bearer '.$access_token
        );

        $curl = curl_init();
        if($tipo == 'user'){
            $url = config('app.apiUrl').'citiesAdmin?page='.$page;
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }else{
            $url = config('app.apiUrl').'cities?page='.$page;
        };
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        try{
            $inputs = [];
            $inputs["citiesTotal"] = $res["tot"];
            $inputs["paginator"] = $res["paginator"];
            $inputs["cityList"] = $res["cities"];
            $inputs["continents"] = $res["continents"];
            $inputs["search_box"] = $search_box;
            $inputs["page"] = $page;
            $inputs["st"] = $st;
            return view('admin.cities', $inputs);
        } catch ( \Exception $e ) {
            $route = $this->noLoginFind();
                    return redirect()->route($route);
        }
    }

    public function citiesAdmin(Request $request, $tipo = 'user')
    {
        return $this->cities($request, "admin");
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
            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);

            $url = config('app.apiUrl').'initiativesAdmin';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
            $data = curl_exec($curl);
            curl_close($curl);

            $res = json_decode( $data, true);

            Log::info("#ADMIN INITIATIVE List");
            //Log::info($res);
            try{
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
        } catch ( \Exception $e ) {
            $route = $this->noLoginFind();
            return redirect()->route($route);
         }

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

                $access_token = Cookie::get('stoken');
                $headers = array('Authorization:Bearer '.$access_token);
                $url = config('app.apiUrl').'tastierLifeAdmin';
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_HEADER, false);
                curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($curl, CURLOPT_POST, 1);
                curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
                $data = curl_exec($curl);
                curl_close($curl);

                $res = json_decode( $data, true);

                Log::info("#ADMIN TastierLife List");
                //Log::info($res);
                try{
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


                } catch ( \Exception $e ) {
                    $route = $this->noLoginFind();
                    return redirect()->route($route);
                    //return redirect()->route('admin.login');
                }

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
        $access_token = Cookie::get('stoken');
        $headers = array(
                    'Authorization:Bearer '.$access_token
                );
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN Tours List");
        //Log::info($res);
        try{
            $inputs = [];
            $inputs['tours'] = $res['tours'];
            $inputs['tot'] = $res['tot'];
            $inputs['paginator'] = $res['paginator'];
            $inputs['page'] = $page;
            $inputs['search_box'] = $search;
            //Log::info("#PAGE: ".$page);

            return view('admin.tours',$inputs);
        } catch ( \Exception $e ) {
            $route = $this->noLoginFind();
                    return redirect()->route($route);
        }
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
        $access_token = Cookie::get('stoken');
        $headers = array('Authorization:Bearer '.$access_token);
        $url = config('app.apiUrl').'about/timeline/list';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        $section = $request->input("section");
        try{
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
        } catch ( \Exception $e ) {
            $route = (new AdminController)->noLoginFind();
                        return redirect()->route($route);
            }
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
            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);
            $url = config('app.apiUrl').'adminContacts';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
            $data = curl_exec($curl);
            curl_close($curl);

            $res = json_decode( $data, true);

            Log::info("#ADMIN Contact List");
            //Log::info($res);
        try{
            $inputs = [];
            $inputs["total"] = $res["tot"];
            $inputs["paginator"] = $res["paginator"];
            $inputs["list"] = $res["contact"];
            $inputs["search_box"] = $search_box;
            $inputs["page"] = $page;
            $inputs["st"] = $st;
            //return view('admin.cities', $inputs);

            return view('admin.contact', $inputs);
        } catch ( \Exception $e ) {
            $route = $this->noLoginFind();
                        return redirect()->route($route);
            }
    }
    public function main(Request $request)
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

        $inputs["section"] = $request->input("section");
        $inputs["sub"] = $request->input("sub");

        $access_token = Cookie::get('stoken');
        $headers = array('Authorization:Bearer '.$access_token);
        $url = config('app.apiUrl').'mainSiteContent/home';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);
        curl_close($curl);

        Log::info("MAIN SITE :::. ");
        Log::info( $data );
        try{
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

            /////////////////////////////////7
        } catch ( \Exception $e ) {
            $route = (new AdminController)->noLoginFind();
                        return redirect()->route($route);
            }
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

                Log::info(  "#Main Content#"  );
                Log::info(  $res  );
            try{
                $status = $res["status"];

                if($res==''){

                    $res = [];
                    $res["status"] = 401;
                    $res["message"] = "Unauthorized";
                };

            } catch ( \Exception $e ) {
                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            }

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
        try{
            Log::info(  "#Main Content#"  );
            Log::info(  $res  );
            $status = $res["status"];
            if($res==''){

                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };

        } catch ( \Exception $e ) {
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
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
            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
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
        try{
            $status = $res["status"];
            if($res==''){

                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };

        } catch ( \Exception $e ) {
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }

        return json_encode($res );
    }

    public function mainBannerDelete(Request $request)
    {
        Log::info(  "##LLEGO al DELETE :::"   );
        $idBanner = $request->input("idBanner");

        $url = config('app.apiUrl').'banners/delete?idBanner='.$idBanner;

        try{
            $access_token = Cookie::get('stoken');
            $headers = array(
                        'Authorization:Bearer '.$access_token
                    );
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, [
                'idBanner' => $idBanner
            ] );
            $data = curl_exec($curl);
            curl_close($curl);
            Log::info(  $data  );

            if($data == ''){
                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            }else{

            $res = json_decode( $data, true);
            };
        } catch ( \Exception $e ) {
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
        Log::info(  "###---> DELETE BANNER"  );
        Log::info(  $res  );
        if($res == ''){
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        };
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
            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, [
                'idBanner' => $idBanner,
                'banner' => $banner
            ] );
            $data = curl_exec($curl);
            curl_close($curl);

            $res = json_decode( $data, true);

            Log::info(  $res  );
        try{
            $status = $res["status"];
            if($res==''){

                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };

        } catch ( \Exception $e ) {
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
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
            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);
            $url = config('app.apiUrl').'user';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
            $data = curl_exec($curl);
            curl_close($curl);

            $res = json_decode( $data, true);

            Log::info("#ADMIN Users List");
            //Log::info($res);
        try{
            $inputs = [];
            $inputs['users'] = $res['Users'];
            $inputs['tot'] = $res['tot'];
            $inputs['paginator'] = $res['paginator'];
            $inputs['page'] = $page;
            $inputs['search_box'] = $search;

            return view('admin.users',$inputs);
        } catch ( \Exception $e ) {
                        $route = $this->noLoginFind();
                        return redirect()->route($route);
        };
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
            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);
            $url = config('app.apiUrl').'user/store';
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
            Log::info("USER SAVE ::");
            //Log::info($res);
        try{
            if($res["status"] != 200){
                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };
        } catch ( \Exception $e ) {
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
        $res = json_encode( $res, true );

        return $res;

    }

    public function users_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        try{
            $access_token = Cookie::get('stoken');
            $headers = array(
                        'Authorization:Bearer '.$access_token
                    );
            $url = config('app.apiUrl').'user/delete/'.$id;
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
            Log::info("USER DELETE ::");
            //Log::info($res);
            if($res==''){

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

    public function newsletter(Request $request)
    {
        $page = $request->input("page");
        Log::info($page." <--page");

        if(!$page){ $page=1;   };

        try{
            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);
            $url = config('app.apiUrl').'newsletterAdmin?page='.$page;
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
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
        } catch ( \Exception $e ) {
            $route = $this->noLoginFind();
                    return redirect()->route($route);
        }
    }

    public function newsletterDownloadVerify(Request $request)
    {

            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);
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
        if($res==''){
            $data = [];
            $data["status"] = 401;
            $data["message"] = "Unauthorized";

        };
        $data =  json_encode($data );

        return $data;

        //return view('admin.newsletter', $inputs);
    }

}

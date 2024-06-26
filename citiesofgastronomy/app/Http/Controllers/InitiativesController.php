<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\AdminController;

class InitiativesController extends Controller
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
        //Log::info("DAtta Result-- ::");


        $url = config('app.apiUrl').'initiatives/find/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN INITIATIVE :: VIEW");
        //Log::info(config('app.apiUrl').'initiatives/'.$id);
        //Log::info($res);

        $inputs = [];
        $inputs["SocialNetworkType"] = $res_home["SocialNetworkType"];
        $inputs["info"] = $res_home["info"];

        $inputs["initiative"] = [];
        $inputs["initiative"]["photo"] = $res["iniciative"]["photo"];
        $inputs["initiative"]["name"] = $res["iniciative"]["name"];
        $inputs["initiative"]["id"] = $res["iniciative"]["id"];
        $inputs["initiative"]["continent"] = $res["iniciative"]["continentName"];
        $inputs["initiative"]["startDate"] = $res["iniciative"]["startDate"];
        $inputs["initiative"]["endDate"] = $res["iniciative"]["endDate"];
        $inputs["initiative"]["description"] = $res["iniciative"]["description"];
        $inputs["initiative"]["sdg_filter"] = $res["iniciative"]["sdg_filter"];
        $inputs["initiative"]["type_filter"] = $res["iniciative"]["type_filter"];
        $inputs["initiative"]["connections_filter"] = $res["iniciative"]["conections_filter"];
        $inputs["initiative"]["topics_filter"] = $res["iniciative"]["topics_filter"];
        $inputs["initiative"]["cities_filter"] = $res["iniciative"]["cities_filter"];
        $inputs["id"] = $id;
        $inputs["gallery"] = $res["iniciative"]["images"];
        $inputs["links"] = $res["iniciative"]["links"];
        $inputs["files"] = $res["iniciative"]["pdf"];

        return view('initiatives.show', $inputs);

    }

    public function initiatives_new()
    {
        $id='';
        $access_token = Cookie::get('stoken');
        $headers = array(
            'Authorization:Bearer '.$access_token
        );
        $url = config('app.apiUrl').'initiatives/create';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN INITIATIVE ");
        //Log::info($res);

        try{
            $inputs = [];

            $inputs["iniciative"]["photo"] = '';
            $inputs["iniciative"]["name"] = '';
            $inputs["iniciative"]["id"] = '';
            $inputs["iniciative"]["continent"] = '';
            $inputs["iniciative"]["startDate"] = '';
            $inputs["iniciative"]["endDate"] = '';
            $inputs["iniciative"]["description"] = '';
            $inputs["iniciative"]["sdg_filter"] = [];
            $inputs["iniciative"]["type_filter"] = [];
            $inputs["iniciative"]["conections_filter"] = [];
            $inputs["iniciative"]["topics_filter"] = [];
            $inputs["iniciative"]["cities_filter"] = [];
            $inputs["id"] = $id;
            $inputs["citiesFilter"] = $res["citiesFilter"];
            $inputs["typeOfActivityFilter"] = $res["typeOfActivityFilter"];
            $inputs["TopicsFilter"] = $res["TopicsFilter"];
            $inputs["sdgFilter"] = $res["sdgFilter"];
            $inputs["ConnectionsToOtherFilter"] = $res["ConnectionsToOtherFilter"];
            $inputs["Continents"] = $res["Continent"];
            $inputs["gallery"] = [];
            $inputs["links"] = [];
            $inputs["files"] = [];

            //Log::info($inputs["sdgFilter"]);

            return view('initiatives.new', $inputs);
        } catch ( \Exception $e ) {
                    $route = (new AdminController() )->noLoginFind();
                    return redirect()->route($route);
        }
    }
    public function initiatives_edit($id)
    {

        $access_token = Cookie::get('stoken');
        $headers = array(
            'Authorization:Bearer '.$access_token
        );
        $url = config('app.apiUrl').'initiatives/edit/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN INITIATIVE :: EDIT");
        //Log::info(config('app.apiUrl').'initiatives/'.$id);
        //Log::info($res);
        try{

            $inputs = [];

            $inputs["iniciative"] = $res["iniciative"];
            $inputs["id"] = $id;
            $inputs["citiesFilter"] = $res["citiesFilter"];
            $inputs["typeOfActivityFilter"] = $res["typeOfActivityFilter"];
            $inputs["TopicsFilter"] = $res["TopicsFilter"];
            $inputs["sdgFilter"] = $res["sdgFilter"];
            $inputs["ConnectionsToOtherFilter"] = $res["ConnectionsToOtherFilter"];
            $inputs["Continents"] = $res["Continent"];
            $inputs["gallery"] = $res["iniciative"]["images"];
            $inputs["links"] = $res["iniciative"]["links"];
            $inputs["files"] = $res["iniciative"]["pdf"];

            //Log::info($inputs["sdgFilter"]);

            return view('initiatives.new', $inputs);
        } catch ( \Exception $e ) {
            $route = (new AdminController() )->noLoginFind();
                    return redirect()->route($route);
        }
        //return view('initiatives.edit');
    }
    public function initiatives_store(Request $request){


            Log::info("----> INITIATIVE STORE..");
            $id = $request->input("id");
            $name = $request->input("data_name");
            $continent = $request->input("data_continent");
            $startDate = $request->input("data_startdate");
            $endDate = $request->input("data_enddate");
            $description = $request->input("data_description");

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
                'idContinent' => $continent,
                'startDate' => $startDate,
                'endDate' => $endDate,
                'description' => $description,
                'photo' => $photo
            ];

            ///////////////////////////////////////FILTERS
            //CITIES
            $idF0 = $request->input("citiesFilterrIds");
            //Log::info("-----------------CITIES filters Ids");
            $idF = explode(',', $idF0);
            for($i = 0; $i < count($idF)  ; $i++){
                $ifilter = 'citiesFilter'.$idF[$i];
                $dattaSend[$ifilter] = $request->input($ifilter);
                //Log::info($ifilter.' -> '.$request->input($ifilter));
            }
            //type ----
            $idF0 = $request->input("typeOfActivityFilterIds");
            //Log::info("-----------------TYPE filters Ids");
            $idF = explode(',', $idF0);
            for($i = 0; $i < count($idF)  ; $i++){
                $ifilter = 'typeOfActivityFilter'.$idF[$i];
                $dattaSend[$ifilter] = $request->input($ifilter);
                //Log::info($ifilter.' -> '.$request->input($ifilter));
            }
            //topics ----
            $idF0 = $request->input("TopicsFilterIds");
            //Log::info("-----------------Topics filters Ids");
            $idF = explode(',', $idF0);
            for($i = 0; $i < count($idF)  ; $i++){
                $ifilter = 'topicsFilter'.$idF[$i];
                $dattaSend[$ifilter] = $request->input($ifilter);
                //Log::info($ifilter.' -> '.$request->input($ifilter));
            }
            //connections ----
            $idF0 = $request->input("ConnectionsToOtherFilterIds");
            //Log::info("-----------------Conexion filters Ids");
            $idF = explode(',', $idF0);
            for($i = 0; $i < count($idF)  ; $i++){
                $ifilter = 'connectionsToOtherFilter'.$idF[$i];
                $dattaSend[$ifilter] = $request->input($ifilter);
                //Log::info($ifilter.' -> '.$request->input($ifilter));
            }
            //SDG
            $idF0 = $request->input("sdgFilterIds");
            //Log::info("-----------------SDG filters Ids");
            $idF = explode(',', $idF0);
            for($i = 0; $i < count($idF)  ; $i++){
                $ifilter = 'sdgFilter'.$idF[$i];
                $dattaSend[$ifilter] = $request->input($ifilter);
                //Log::info($ifilter.' -> '.$request->input($ifilter));
            }//*/
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


            $cant_links =$request->input('cant_links');
            Log::info("#Cant Links");
            $dattaSend["cant_links"] = $cant_links;
            for($i = 1; $i < $cant_links + 1;$i++){
                $id1 = 'link'.$i;
                $link =  $request->input($id1);
                $dattaSend[$id1] = $link;
                $id1 = 'titleLink'.$i;
                $titleLink =  $request->input($id1);
                $dattaSend[$id1] = $titleLink;
                $id1 = 'idLink'.$i;
                $idLink =  $request->input($id1);
                $dattaSend[$id1] = $idLink;
                $id1 = 'deleteLink'.$i;
                $deleteLink =  $request->input($id1);
                $dattaSend[$id1] = $deleteLink;
                Log::info($titleLink);
            };


            $cant_files =$request->input('cant_files');
            $dattaSend["cant_files"] = $cant_files;
            for($i = 1; $i < $cant_files + 1;$i++){
                $id1 = 'file'.$i;

                $id1 = 'title'.$i;
                $id2 = 'titlefile'.$i;
                $titleLink =  $request->input($id2);
                $dattaSend[$id1] = $titleLink;
                $id1 = 'idFile'.$i;
                $idFile =  $request->input($id1);
                $dattaSend[$id1] = $idFile;
                $id1 = 'deleteFile'.$i;
                $deleteLink =  $request->input($id1);
                $dattaSend[$id1] = $deleteLink;
            };

            $url = config('app.apiUrl').'initiatives/store';
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
            $status = $res["status"];
            Log::info("ini STORE -------------->");
        } catch ( \Exception $e ) {
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        };

        $res = json_encode( $res, true);
        return $res;
        //return redirect( "/admin/initiatives/" ) ->with('message', $res["message"]);

    }

    public function initiatives_delete(Request $request)
    {
        Log::info("INITIATIVE DELETE ::");
        $id = $request->input("id");
        $dattaSend = [];

        try{
            $access_token = Cookie::get('stoken');
            $headers = array(
                        'Authorization:Bearer '.$access_token
                    );
            $url = config('app.apiUrl').'initiatives/delete/'.$id;
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
            //Log::info($url);
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

    public function initiatives_search(Request $request)
    {

        $keyword = $request->input("search_box");
        $actype = $request->input("select_activity_filter");
        $topic = $request->input("select_topic_filter");
        $sdg = $request->input("select_sdg_filter");
        $connection = $request->input("select_connection_filter");

        $search_inputs = array(
            'actype' => $actype,
            'topic' => $topic,
            'sdg' => $sdg,
            'connection' => $connection,
        );

        $section = $request->input("section");
        $sub = $request->input("sub");
        $page = $request->input("page");

        if(!$page){ $page=1;   };
        $st = $request->input("st");

        Log::info("#SEARCH INITIATIVEs: ".$keyword.' - section: '.$section.' - sub: '.$sub . '/ filters: '.$actype .','.$topic .','.$sdg .','.$connection);
        //Log::info(!$sub ? $keyword :  '');

        $fields = array(
            'searchTypeOfActivity' => ($sub==='actype' ? $keyword :  ''),
            'searchTopics' => ($sub==='topics' ? $keyword :  ''),
            'searchSDG' => ($sub==='sdg' ? $keyword :  ''),
            'searchConnectionsToOther' => ($sub==='connections' ? $keyword :  ''),
            'search' => ($section ==='in' ? $keyword :  ''),
            'filterType' => ($actype != 'default' ? $actype :  ''),
            'filterTopic' => ($topic != 'default' ? $topic :  ''),
            'filterSDG' => ($sdg != 'default' ? $sdg :  ''),
            'filterConnections' => ($connection != 'default' ? $connection :  ''),
            'filterCities' => ''
        );

        $fields_string = http_build_query($fields);
        //Log::info(config('app.apiUrl'));

        $url = config('app.apiUrl').'initiatives';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        //Log::info($res);

        $inputs = [];
        $inputs["initiatives"] = $res["initiatives"];
        //Total de registros encontrados
        $inputs["total"] = $res["tot"];
        //Cantidad de paginas
        $inputs["paginator"] = $res["paginator"];
        //contenido del buscador
        $inputs["search_box"] = $keyword;
        //pagina en la que estamos
        $inputs["page"] = $page;
        $inputs["st"] = $st;
        $inputs["section"] = $section;
        $inputs["sub"] = $sub;
        $inputs["search_inputs"] = $search_inputs;

        $inputs["typeOfActivity"] = $res["typeOfActivity"];
        $inputs["Topics"] = $res["Topics"];
        $inputs["sdg"] = $res["sdg"];
        $inputs["ConnectionsToOther"] = $res["ConnectionsToOther"];

        //Log::info('paginator:'.$inputs["paginator"].'/page:'.$inputs["page"].'/st:'.$inputs["st"]);

        return view('admin.initiatives', $inputs);

    }

    public function typeOfActivity_save(Request $request)
    {


            $id = $request->input("id");
            $name = $request->input("name");
            $dattaSend = [
                'id' => $id,
                'name' => $name
            ];
            $access_token = Cookie::get('stoken');
            $headers = array('Authorization:Bearer '.$access_token);
            $url = config('app.apiUrl').'typeOfActivity/store';
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
            //Log::info("TIMELINE SAVE ::");
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

    public function typeOfActivity_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];
        $access_token = Cookie::get('stoken');
        $headers = array(
                    'Authorization:Bearer '.$access_token
                );

        try{
            $url = config('app.apiUrl').'typeOfActivity/delete/'.$id;
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
            Log::info("TYPE OF ACTIVITY DELETE ::");
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

    public function topics_save(Request $request)
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
            $id = $request->input("id");
            $name = $request->input("name");
            $dattaSend = [
                'id' => $id,
                'name' => $name
            ];

            $url = config('app.apiUrl').'topic/store';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
            $data = curl_exec($curl);
            curl_close($curl);

            $res = json_decode( $data, true);
            Log::info("TOPICS SAVE ::");
            //Log::info($res);
            if($res["status"] != 200){
                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };
        } else{
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
        $res = json_encode( $res, true );
        return $res;
    }

    public function topics_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];
        $access_token = Cookie::get('stoken');
        $headers = array(
                    'Authorization:Bearer '.$access_token
                );

        try{
            $url = config('app.apiUrl').'topic/delete/'.$id;
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
            Log::info("TOPICS DELETE ::");
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

    public function sdg_save(Request $request)
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
            $id = $request->input("id");
            $name = $request->input("name");
            $number = $request->input("number");
            $dattaSend = [
                'id' => $id,
                'name' => $name,
                'number' => $number
            ];

            $url = config('app.apiUrl').'sdg/store';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
            $data = curl_exec($curl);
            curl_close($curl);

            $res = json_decode( $data, true);
            Log::info("SDG SAVE ::");
            //Log::info($res);

            if($res["status"] != 200){
                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };
        } else{
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
        $res = json_encode( $res, true );
        return $res;
    }

    public function sdg_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];
        $access_token = Cookie::get('stoken');
        $headers = array(
                    'Authorization:Bearer '.$access_token
                );

        try{
            $url = config('app.apiUrl').'sdg/delete/'.$id;
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
            Log::info("SDG DELETE ::");
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

    public function connection_save(Request $request)
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
            $id = $request->input("id");
            $name = $request->input("name");
            $dattaSend = [
                'id' => $id,
                'name' => $name
            ];

            $url = config('app.apiUrl').'connectionsToOther/store';
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
            $data = curl_exec($curl);
            curl_close($curl);

            $res = json_decode( $data, true);
            Log::info("CONNECTION SAVE ::");
            //Log::info($res);

            if($res["status"] != 200){
                $res = [];
                $res["status"] = 401;
                $res["message"] = "Unauthorized";
            };
        } else{
            $res = [];
            $res["status"] = 401;
            $res["message"] = "Unauthorized";
        }
        $res = json_encode( $res, true );

        return $res;
    }

    public function connection_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        $access_token = Cookie::get('stoken');
        $headers = array(
                    'Authorization:Bearer '.$access_token
                );

        try{
            $url = config('app.apiUrl').'connectionsToOther/delete/'.$id;
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
            Log::info("CONNECTION DELETE ::");
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
}

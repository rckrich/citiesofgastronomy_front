<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class InitiativesController extends Controller
{
    public function index()
    {

        $url = config('app.apiUrl').'home';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        $res = json_decode( $data, true);
        //Log::info("DAtta Result-- ::");

        $inputs = [];
        $inputs["bannerAbout"] = $res["bannerAbout"];
        $inputs["bannerNumberAndStats"] = $res["bannerNumberAndStats"];
        //Log::info($inputs);
        $inputs["cityList"] = $res["cities"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];
        return view('initiatives.show', $inputs);
    }

    public function initiatives_new()
    {
        $id='';
        $url = config('app.apiUrl').'initiatives/create';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);

        Log::info("#ADMIN INITIATIVE ");
        //Log::info($res);

        $inputs = [];

        $inputs["iniciative"] = [];
        $inputs["iniciative"]["photo"] = '';
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
    }
    public function initiatives_edit()
    {
        return view('initiatives.edit');
    }
    public function initiatives_store(Request $request){
        Log::info("----> INITIATIVE STORE..");
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
            'id' => '',
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
        Log::info("#Cant Links");
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
            Log::info($titleLink);
        };


        $cant_files =$request->input('cant_files');
        $arrPOST["cant_files"] = $cant_files;
        for($i = 1; $i < $cant_files + 1;$i++){
            $id1 = 'file'.$i;

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

        $url = config('app.apiUrl').'initiatives/store';

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

        return redirect( "/admin/initiatives/create" );

    }


    public function initiatives_search(Request $request)
    {

        $keyword = $request->input("search_box");
        $section = $request->input("section");
        $sub = $request->input("sub");
        Log::info("#SEARCH: ".$keyword.' - section: '.$section.' - sub: '.$sub);
        $fields = array(
            'searchTypeOfActivity' => ($sub==='actype' ? $keyword :  ''),
            'searchTopics' => ($sub==='topics' ? $keyword :  ''),
            'searchSDG' => ($sub==='sdg' ? $keyword :  ''),
            'searchConnectionsToOther' => ($sub==='connections' ? $keyword :  '')
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
        $inputs["search_box"] = '';
        //pagina en la que estamos
        $inputs["page"] = 1;
        $inputs["st"] = '';

        $inputs["section"] = $section;
        $inputs["sub"] = $sub;

        $inputs["typeOfActivity"] = $res["typeOfActivity"];
        $inputs["Topics"] = $res["Topics"];
        $inputs["sdg"] = $res["sdg"];
        $inputs["ConnectionsToOther"] = $res["ConnectionsToOther"];

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

        $url = config('app.apiUrl').'typeOfActivity/store';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        //Log::info("TIMELINE SAVE ::");
        //Log::info($res);

        return $res;
    }

    public function typeOfActivity_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        $url = config('app.apiUrl').'typeOfActivity/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("TYPE OF ACTIVITY DELETE ::");
        //Log::info($res);

        return $res;
    }

    public function topics_save(Request $request)
    {
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

        return $res;
    }

    public function topics_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        $url = config('app.apiUrl').'topic/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("TOPICS DELETE ::");
        //Log::info($res);

        return $res;
    }

    public function sdg_save(Request $request)
    {
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

        return $res;
    }

    public function sdg_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        $url = config('app.apiUrl').'sdg/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("SDG DELETE ::");
        //Log::info($res);

        return $res;
    }

    public function connection_save(Request $request)
    {
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

        return $res;
    }

    public function connection_delete(Request $request)
    {
        $id = $request->input("id");
        $dattaSend = [];

        $url = config('app.apiUrl').'connectionsToOther/delete/'.$id;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CONNECTION DELETE ::");
        //Log::info($res);

        return $res;
    }
}

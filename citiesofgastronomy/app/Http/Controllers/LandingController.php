<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandingController extends Controller
{
    public function index()
    {
        /*$clients = Client::all();
        $texts = collect(Text::all());
        $info = RckInfo::all();
        $projects = Project::orderBy('creation_date','desc')->get();
        foreach($projects as $project){
            $projectTags = ProjectType::select('sw_types.name')->where('project_id', $project->id)->join('sw_types', 'project_types.swtype_id', '=', 'sw_types.id')->get();
            foreach($projectTags as $projectTag){
                $project['tags'] .= ' '.str_replace(' ','_',$projectTag->name).' ';
            }
        };
        $swTypes = SwType::all();

        return view('home.index', compact('clients','texts','info','projects','swTypes'));*/

        $url = config('app.apiUrl').'home';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        $data = str_replace("'", '&apos;', $data);
        $data = str_replace("´", '&apos;', $data);
        $data = str_replace("`", '&apos;', $data);
        $res = json_decode( $data, true);
        //Log::info("DAtta Result-- ::");

        $inputs = [];
        $inputs["bannerAbout"] = $res["bannerAbout"];
        $inputs["bannerNumberAndStats"] = $res["bannerNumberAndStats"];
        //Log::info($inputs);
        $inputs["cityList"] = $res["cities"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];
        $inputs["initiatives"] = $res["recentInitiatives"];
        $inputs["news"] = $res["news"];
        $inputs["open_calls"] = $res["openCalls"];

        return view('landing.home', $inputs);
    }
    public function cities()
    {
        $cantItems = 99999;

        Log::info(config('app.apiUrl'));
        $url = config('app.apiUrl').'cities?cantItems='.$cantItems;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);
        Log::info($data);

        $res = json_decode( $data, true);

        $inputs = [];
        $inputs["cityList"] = $res["cities"];
        $inputs["banners"] = $res["bannerCities"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];
        return view('landing.cities', $inputs);
    }
    public function about()
    {

        $url = config('app.apiUrl').'about';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("# ABOUT ::");
        //Log::info($res["bannerAbout"]);

        $inputs = [];
        $inputs["banners"] = $res["banner"];
        $inputs["bannerAbout"] = $res["bannerAbout"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];
        $inputs["timeline"] = $res["timeline"];
        $inputs["faqs"] = $res["faq"];

        $inputs["timeline"] = [];

        foreach ($res["timeline"] as $data) {
            $timeline = [
                "id"=> $data["id"],
                "tittle"=>  $data["tittle"],
                "link"=> $data["link"],
                "startDate"=> $data["startDate"],
                "endDate"=> $data["endDate"],
                "startDateFormat"=> $data["startDateFormat"],
                "endDateFormat"=> $data["endDateFormat"],
                "monthNum" => date('n',(strtotime($data["startDate"]))),
            ];
            array_push($inputs["timeline"],$timeline);
        }

        return view('landing.about', $inputs);
    }
    public function initiatives()
    {

        $url = config('app.apiUrl').'initiatives';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info($res["banner"]);

        $inputs = [];
        $inputs["initiatives"] = $res["initiatives"];
        $inputs["banners"] = $res["banner"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];
        $inputs["total"] = $res["tot"];        //Total de registros encontrados
        $inputs["cities"] = $res["citiesFilter"];
        $inputs["typeOfActivity"] = $res["typeOfActivity"];
        $inputs["Topics"] = $res["Topics"];
        $inputs["sdgs"] = $res["sdg"];
        $inputs["ConnectionsToOther"] = $res["ConnectionsToOther"];

        return view('landing.initiatives', $inputs);
    }
    public function tastier_life()
    {

        $url = config('app.apiUrl').'tastierLife';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("TASTIER LIFE ::");
        Log::info($res["banner"]);

        $inputs = [];
        $inputs["tastierLife"] = $res["tastierLife"];
        $inputs["banners"] = $res["banner"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];

        return view('landing.tastier_life', $inputs);
    }
    public function tours()
    {

        $url = config('app.apiUrl').'tours';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("TOURS ::");
        Log::info($res["banner"]);

        $inputs = [];
        $inputs["tours"] = $res["tours"];
        $inputs["banners"] = $res["banner"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];

        return view('landing.tours', $inputs);
    }

    public function stats()
    {
        $inputs = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["info"] = [];
        return view('landing.stats', $inputs);
    }
    public function calendar()
    {
        $inputs = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["info"] = [];

        $url = config('app.apiUrl').'calendar';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CALENDAR ::");
        Log::info($res["banner"]);

        $inputs = [];
        $inputs["calendar"] = $res["calendar"];
        $inputs["banners"] = $res["banner"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];

        return view('landing.calendar', $inputs);
    }
    public function contact()
    {
        $url = config('app.apiUrl').'contacts';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CONTACT ::");
        Log::info($res["banner"]);

        $inputs = [];
        $inputs["contacts"] = $res["contacts"];
        $inputs["banners"] = $res["banner"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];

        return view('landing.contact', $inputs);
    }
    public function search(Request $request)
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
        $SocialNetworkType = $res["SocialNetworkType"];
        $info = $res["info"];

        $keyword = $request->input('search_box');
        return view('landing.search', compact('keyword','inputs','info','SocialNetworkType'));

    }
    public function newsletter(Request $request)
    {
        $newsletter = $request->input("newsletter");
        $dattaSend = [
            'newslettermail' => $newsletter
        ];

        $url = config('app.apiUrl').'newsletter';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $dattaSend );
        $data = curl_exec($curl);
        curl_close($curl);

        $res = json_decode( $data, true);
        Log::info("CONTACT ::");
        //Log::info($res);

        return $res;
    }

    public function privacy_policy(){
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



        return view('commons.privacy_policy', $inputs);
    }

    public function terms_conditions(){
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



        return view('commons.terms_conditions', $inputs);
    }

}

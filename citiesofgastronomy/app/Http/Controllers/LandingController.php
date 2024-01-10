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
        $res = json_decode( $data, true);
        //Log::info("DAtta Result-- ::");

        $inputs = [];
        $inputs["bannerAbout"] = $res["bannerAbout"];
        $inputs["bannerNumberAndStats"] = $res["bannerNumberAndStats"];
        //Log::info($inputs);
        $inputs["cityList"] = $res["cities"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];

        return view('landing.home', $inputs);
    }
    public function cities()
    {
        Log::info(config('app.apiUrl'));
        $url = config('app.apiUrl').'cities';
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
        Log::info($res["banner"]);

        $inputs = [];
        //$inputs["initiatives"] = $res["initiatives"];
        $inputs["banners"] = $res["banner"];
        $inputs["SocialNetworkType"] = $res["SocialNetworkType"];
        $inputs["info"] = $res["info"];

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
        $inputs = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["info"] = [];
        $keyword = $request->input('search_box');
        return view('landing.search', compact('keyword'));

    }
}

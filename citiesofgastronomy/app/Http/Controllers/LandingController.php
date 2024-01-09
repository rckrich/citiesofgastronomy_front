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
        $inputs = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["info"] = [];
        return view('landing.about', $inputs);
    }
    public function initiatives()
    {
        $inputs = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["info"] = [];
        return view('landing.initiatives', $inputs);
    }
    public function tastier_life()
    {
        $inputs = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["info"] = [];
        return view('landing.tastier_life', $inputs);
    }
    public function tours()
    {
        $inputs = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["info"] = [];
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
        return view('landing.calendar', $inputs);
    }
    public function contact()
    {
        $inputs = [];
        $inputs["SocialNetworkType"] = [];
        $inputs["info"] = [];
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

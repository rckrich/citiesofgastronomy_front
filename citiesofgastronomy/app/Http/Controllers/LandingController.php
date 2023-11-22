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

        $inputs = [];
        $inputs["cityList"] = $res["cities"];
        $inputs["bannerAbout"] = $res["bannerAbout"];

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

        $res = json_decode( $data, true);

        $inputs = [];
        $inputs["cityList"] = $res["cities"];
        $inputs["banner"] = $res["bannerCities"];
        return view('landing.cities', $inputs);
    }
    public function about()
    {
        return view('landing.about');
    }
    public function initiatives()
    {
        return view('landing.initiatives');
    }
    public function tastier_life()
    {
        return view('landing.tastier_life');
    }
    public function tours()
    {
        return view('landing.tours');
    }

    public function stats()
    {
        return view('landing.stats');
    }
    public function calendar()
    {
        return view('landing.calendar');
    }
    public function contact()
    {
        return view('landing.contact');
    }
    public function search(Request $request)
    {
        $keyword = $request->input('search_box');
        return view('landing.search', compact('keyword'));

    }
}

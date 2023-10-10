<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('landing.home');
    }
    public function cities()
    {
        return view('landing.cities');
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


    public function news()
    {
        return view('landing.news');
    }
    public function events()
    {
        return view('landing.events');
    }
    public function open_calls()
    {
        return view('landing.open_calls');
    }
    public function projects()
    {
        return view('landing.projects');
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
}

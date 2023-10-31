<!-- resources/views/landing/stats.blade.php -->

@extends('commons.base')

@section('content')
<section id="page_stats">
    <div class="container p-5">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="card-title mb-2">{{__('initiatives.lorem_title')}}</h5>
                <h6><b class="text-orange ">{{__('initiatives.data_city')}}</b>{{__('initiatives.lorem_city')}}</h6>
                <h6><b class="text-orange ">{{__('initiatives.data_continent')}}</b>{{__('initiatives.lorem_continent')}}</h6>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5">
                <img src="{{asset('assets/img/Home/open_calls.png')}}" class="mx-auto my-auto w-100 br-9" alt="...">
            </div>
        </div>
    </div>

    <div class="container p-5">
        <div class="row">
            <div class="col-4 p-5">
                <div class="p-3 bg-orange text-white text-center">
                    {{__('initiatives.about_title')}}
                </div>
                <div class="p-3 bg-gray text-left">
                    <h5 class="text-orange">{{__('initiatives.data_type')}}</h5>
                    <p class="text-white">{{__('initiatives.lorem_type')}}</p>
                    <h5 class="text-orange">{{__('initiatives.data_topics')}}</h5>
                    <p class="text-white">{{__('initiatives.lorem_topics')}}</p>
                    <h5 class="text-orange">{{__('initiatives.data_startdate')}}</h5>
                    <p class="text-white">{{__('initiatives.lorem_startdate')}}</p>
                    <h5 class="text-orange">{{__('initiatives.data_enddate')}}</h5>
                    <p class="text-white">{{__('initiatives.lorem_enddate')}}</p>
                    <h5 class="text-orange">{{__('initiatives.data_other')}}</h5>
                    <p class="text-white">{{__('initiatives.lorem_other')}}</p>
                    <h5 class="text-orange">{{__('initiatives.data_sdg')}}</h5>
                    <p class="text-white">{{__('initiatives.lorem_sdg')}}</p>
                    <h5 class="text-orange">{{__('initiatives.data_author')}}</h5>
                    <p class="text-white">{{__('initiatives.lorem_author')}}</p>
                </div>
            </div>
            <div class="col-8 p-5">
                <p>{{__('initiatives.lorem_text0')}}</p>
                <p>{{__('initiatives.lorem_text1')}}</p>
                <p>{{__('initiatives.lorem_text2')}}</p>
                <p>{{__('initiatives.lorem_text3')}}</p>
            </div>
        </div>
    </div>
    
    <div class="container p-5">
        <div class="row align-items-center mb-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('general.gallery')}}</h1>
                </div>
        </div>
    </div>



</section>
@endsection
<!-- resources/views/landing/stats.blade.php -->

@extends('commons.base')

@section('content')
<section id="page_stats">
    <div class="container p-5">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title-sm mb-4">{{__('initiatives.lorem_title')}}</h5>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('initiatives.data_city')}}</b>{{__('initiatives.lorem_city')}}</h6>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('initiatives.data_continent')}}</b>{{__('initiatives.lorem_continent')}}</h6>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                <img src="{{asset('assets/img/Home/open_calls.png')}}" class="mx-auto my-auto w-100 br-9" alt="...">
            </div>
        </div>
    </div>

    <div class="container p-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 p-5">
                <div class="p-5 title-xs bg-orange text-white text-center">
                    <b>{{__('initiatives.about_title')}}</b>
                </div>
                <div class="p-5 bg-gray text-left">
                    <p class="py-2 text-orange subtitle"><b>{{__('initiatives.data_type')}}</b></p>
                    <p class="py-2 text-white data">{{__('initiatives.lorem_type')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('initiatives.data_topics')}}</b></p>
                    <p class="py-2 text-white data">{{__('initiatives.lorem_topics')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('initiatives.data_startdate')}}</b></p>
                    <p class="py-2 text-white data">{{__('initiatives.lorem_startdate')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('initiatives.data_enddate')}}</b></p>
                    <p class="py-2 text-white data">{{__('initiatives.lorem_enddate')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('initiatives.data_other')}}</b></p>
                    <p class="py-2 text-white data">{{__('initiatives.lorem_other')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('initiatives.data_sdg')}}</b></p>
                    <p class="py-2 text-white data">{{__('initiatives.lorem_sdg')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('initiatives.data_author')}}</b></p>
                    <p class="py-2 text-white data">{{__('initiatives.lorem_author')}}</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12 col-12 p-5">
                <p class="py-2 data ">{{__('initiatives.lorem_text0')}}</p>
                <p class="py-2 data ">{{__('initiatives.lorem_text1')}}</p>
                <p class="py-2 data ">{{__('initiatives.lorem_text2')}}</p>
                <p class="py-2 data ">{{__('initiatives.lorem_text3')}}</p>
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
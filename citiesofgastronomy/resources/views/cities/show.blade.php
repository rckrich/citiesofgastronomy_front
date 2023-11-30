<!-- resources/views/cities/show.blade.php -->

@extends('commons.base')

@section('content')
<section id="show_city">
    <div>
        <div class="banner-title">
        @if($city['banner'])
        <img class="w-100" src="{{config('app.url').$city['banner']}}"/>
        @else
        <img class="w-100" src="{{asset('assets/img/Banners/IMG_Cities.png')}}"/>
        @endif
        <div class="banner-title-overlay row align-items-center mx-0">
            <div class="banner-img-overlay">
                <h1 class="title-lg text-yellow pb-5">{{$city["name"]}}</h1>
                <h6 class="data py-2"><b class="text-orange">{{$city["country"]}}</b></h6>
                <h6 class="data py-2 text-orange">City of Gastronomy since {{$city["designationyear"]}}</h6>

            </div>
        </div>
        </div>
    </div>
    @if($city['logo'])
    <div class="container p-5">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-4 mx-auto mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                <img src="{{config('app.url').$city['logo']}}" class="mx-auto my-auto w-100 br-9" alt="...">
            </div>
        </div>
    </div>
    @endif

    <div class="container p-5">
        <div class="row">
            <div class="col-1 py-5">
                <div class="row py-2">
                    <a href="" class="px-2 text-right"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="25" width="25"/></a>
                </div>
                <div class="row py-2">
                    <a href="" class="px-2 text-right"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                </div>
                <div class="row py-2">
                    <a href="" class="px-2 text-right"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                </div>
                <div class="row py-2">
                    <a href="" class="px-2 text-right"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 p-5">
                <div class="p-5 title-xs bg-orange text-white text-center">
                    <b>{{__('cities.view.about_title')}}</b>
                </div>
                <div class="p-5 bg-gray text-left">
                    <p class="py-2 text-orange subtitle"><b>{{__('cities.view.data_city')}}</b></p>
                    <p class="py-2 text-white data">{{$city["name"]}}, {{$city["country"]}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('cities.view.data_continent')}}</b></p>
                    <p class="py-2 text-white data">{{$city["continentName"]}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('cities.view.data_population')}}</b></p>
                    <p class="py-2 text-white data">{{$city["population"]}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('cities.view.data_locations')}}</b></p>
                    <p class="py-2 text-white data">{{$city["restaurantFoodStablishments"]}}</p>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-12 p-5">
                <p class="py-2 data ">{{$city["completeDescription"]}}</p>
            </div>
        </div>
    </div>

    <div class="container p-5">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h1 class="title-xl">{{__('general.gallery')}}</h1>
            </div>
        </div>
        <div class="row align-items-center mb-5">
        <div class="row mx-0 p-0 max-height-gallery" data-lightbox="gallery">
            @foreach($gallery as $image)
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{config('app.url').$image['image']}}" data-lightbox="gallery-item" >
                    <img src="{{config('app.url').$image['image']}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            @endforeach

        </div>
        </div>

        <div class="w-100 bb-orange py-5"></div>
    </div>

    <div class="container p-5 row align-items-center">
        <div class="text-center" style="margin: 5rem 0">
            <p class="title-md py-5">{{__('cities.view.more_info')}}</p>
            @foreach($links as $link)
            <p class="data py-2"><a href="{{$link['image']}}" target="_blank" class="text-link text-orange">{{$link['image']}}</a></p>
            @endforeach

            @foreach($files as $file)
            <p class="data py-2"><a href="{{config('app.url').$file['file']}}" target="_blank" class="text-link text-orange">{{$file['title']}}</a></p>
            @endforeach
        </div>
    </div>



</section>
@endsection

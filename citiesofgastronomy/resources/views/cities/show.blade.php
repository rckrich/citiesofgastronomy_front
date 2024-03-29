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
                <h1 class="title-lg text-white pb-lg-5 pb-md-5 pb-sm-3 pb-3">{{$city["name"]}}</h1>
                <h6 class="data py-2"><b class="text-white">{{$city["country"]}}</b></h6>
                <h6 class="data py-2 text-white">City of Gastronomy since {{$city["designationyear"]}}</h6>
            </div>
        </div>
        </div>
    </div>
    @if($city['logo'])
    <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="mt-lg-5 mt-md-3 mt-sm-3 mt-3 row px-0 mx-0 align-items-start">
            <div class="col-lg-5 col-md-8 col-sm-12 col-12 mx-auto mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                <img src="{{config('app.url').$city['logo']}}" class="mx-auto my-auto w-100 br-9" alt="...">
            </div>
        </div>
    </div>
    @endif

    <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="row">
            <!--div class="col-1 py-5">
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
            </div-->
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 p-xl-5 p-lg-4 p-md-5 p-sm-3 p-3">
                <div class="p-lg-4 p-md-4 p-sm-3 p-3 title-xs bg-orange text-white text-center">
                    <b>{{__('cities.view.about_title')}}</b>
                </div>
                <div class="px-lg-5 py-lg-4 p-md-4 p-sm-3 p-3 bg-gray text-left">
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('cities.view.data_city')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{$city["name"]}}, {{$city["country"]}}</p>
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('cities.view.data_continent')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{$city["continentName"]}}</p>
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('cities.view.data_population')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{$city["population"]?number_format($city["population"]):__('general.no_data')}}</p>
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('cities.view.data_locations')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{$city["restaurantFoodStablishments"]?number_format($city["restaurantFoodStablishments"]):__('general.no_data')}}</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 p-lg-4 p-md-3 p-sm-3 p-3">
                <p class="py-2 data "><?php echo $city["description"]?></p>
            </div>
        </div>
    </div>

    <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h1 class="title-xl">{{__('general.gallery')}}</h1>
            </div>
        </div>
        <div class="row align-items-center mb-5">
        <div class="row mx-0 p-0 max-height-gallery" data-lightbox="gallery">
            @foreach($gallery as $image)
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{config('app.url').$image['image']}}" data-lightbox="gallery-item" >
                    <img src="{{config('app.url').$image['image']}}" alt="Gallery Image" class="gallery-img" />
                </a>
            </div>
            @endforeach

        </div>
        </div>

        <div class="w-100 bb-orange py-5"></div>
    </div>

    <div class="container p-lg-5 p-md-5 p-sm-3 p-3 row align-items-center mx-auto">

        <div class="row align-items-center data-sm text-orange">
            <b class="col-auto pe-5">{{__('general.share')}}</b>
            <div class="col-auto px-2 fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size="">
                <a class="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('cities.view',['id'=>$city['id']])}}">
                    <img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/>
                </a>
            </div>
            <!--a class="col-auto px-2"  onclick="shareLinkedIn(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="25" width="25"/></a-->
            <a class="col-auto px-2" href="" onclick="shareTwitter(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
        </div>

        <div class="text-center" style="margin: 5rem 0">
            <p class="title-md py-5">{{__('cities.view.more_info', ['City' => $city["name"] ] )}}</p>
            @foreach($links as $link)
            <p class="data py-2"><a href="{{$link['image']}}" target="_blank" class="text-link text-orange">{{$link['title']}}</a></p>
            @endforeach

            @foreach($files as $file)
            <p class="data py-2"><a href="{{config('app.url').$file['file']}}" target="_blank" class="text-link text-orange">{{$file['title']}}</a></p>
            @endforeach
        </div>
    </div>



</section>
@endsection

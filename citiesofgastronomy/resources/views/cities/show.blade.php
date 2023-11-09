<!-- resources/views/cities/show.blade.php -->

@extends('commons.base')

@section('content')
<section id="show_city">
    <div>
        <div class="banner-title">
        <img class="w-100" src="{{asset('assets/img/Banners/IMG_Cities.png')}}"/>
        <div class="banner-title-overlay row align-items-center mx-0">
            <div class="banner-img-overlay">
                <h1 class="title-lg text-yellow pb-5">{{__('cities.view.city_name')}}</h1>             
                <h6 class="data py-2"><b class="text-orange">{{__('cities.view.country_name')}}</b></h6>
                <h6 class="data py-2 text-orange">{{__('cities.view.cog_since')}}</h6>

            </div>
        </div>            
        </div>
    </div>

    <div class="container p-5">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-4 mx-auto mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                <img src="{{asset('storage/cities/sample.png')}}" class="mx-auto my-auto w-100 br-9" alt="...">
            </div>
        </div>
    </div>

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
                    <p class="py-2 text-white data">{{__('cities.view.lorem_city')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('cities.view.data_continent')}}</b></p>
                    <p class="py-2 text-white data">{{__('cities.view.lorem_continent')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('cities.view.data_population')}}</b></p>
                    <p class="py-2 text-white data">{{__('cities.view.lorem_population')}}</p>
                    <p class="py-2 text-orange subtitle"><b>{{__('cities.view.data_locations')}}</b></p>
                    <p class="py-2 text-white data">{{__('cities.view.lorem_locations')}}</p>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-12 p-5">
                <p class="py-2 data ">{{__('cities.view.lorem_text0')}}</p>
                <p class="py-2 data ">{{__('cities.view.lorem_text1')}}</p>
                <p class="py-2 data ">{{__('cities.view.lorem_text2')}}</p>
                <p class="py-2 data ">{{__('cities.view.lorem_text3')}}</p>
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
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/cities/gallery_sample.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/cities/gallery_sample.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/cities/gallery_sample.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/cities/gallery_sample.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/cities/gallery_sample.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/cities/gallery_sample.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/cities/gallery_sample.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/cities/gallery_sample.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
        </div>
        </div>

        <div class="w-100 bb-orange py-5"></div>
    </div>

    <div class="container p-5 row align-items-center">
        <div class="text-center" style="margin: 5rem 0">
            <p class="title-md py-5">{{__('cities.view.more_info')}}</p>
            <p class="data py-2"><a href="" class="text-link text-orange">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
            <p class="data py-2"><a href="" class="text-link text-orange">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
            <p class="data py-2"><a href="" class="text-link text-orange">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
        </div>
    </div>



</section>
@endsection
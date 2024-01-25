<!-- resources/views/initiatives/show.blade.php -->

@extends('commons.base')

@section('content')
<section id="show_initiative">
    <div class="container p-lg-5 p-md-5 pb-md-3 p-sm-3 p-3">
        <div class="my-5 row px-0 mx-0 align-items-center">
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

    <div class="container p-lg-5 p-md-5 py-md-3 p-sm-3 p-3">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12 col-12 p-xl-5 pt-xl-4 p-lg-4 p-md-5 pt-md-3 p-sm-3 p-3">
                <div class="p-lg-4 p-md-4 p-sm-3 p-3 title-xs bg-orange text-white text-center">
                    <b>{{__('initiatives.about_title')}}</b>
                </div>
                <div class="px-lg-5 py-lg-4 p-md-4 p-sm-3 p-3 bg-gray text-left">
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('initiatives.data_type')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{__('initiatives.lorem_type')}}</p>
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('initiatives.data_topics')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{__('initiatives.lorem_topics')}}</p>
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('initiatives.data_startdate')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{__('initiatives.lorem_startdate')}}</p>
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('initiatives.data_enddate')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{__('initiatives.lorem_enddate')}}</p>
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('initiatives.data_other')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{__('initiatives.lorem_other')}}</p>
                    <p class="pt-2 mb-1 text-orange subtitle"><b>{{__('initiatives.data_sdg')}}</b></p>
                    <p class="pb-2 mb-2 text-white data">{{__('initiatives.lorem_sdg')}}</p>
                    <div class="pb-4">
                        <img src="{{asset('assets/img/number/2.png')}}" width="35" height="35"/>
                        <img src="{{asset('assets/img/number/4.png')}}" width="35" height="35"/>
                        <img src="{{asset('assets/img/number/6.png')}}" width="35" height="35"/>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7 col-sm-12 col-12 p-lg-4 p-md-3 p-sm-3 p-3">
                <p class="py-2 data ">{{__('initiatives.lorem_text0')}}</p>
                <p class="py-2 data ">{{__('initiatives.lorem_text1')}}</p>
                <p class="py-2 data ">{{__('initiatives.lorem_text2')}}</p>
                <p class="py-2 data ">{{__('initiatives.lorem_text3')}}</p>
            </div>
        </div>
    </div>
    
    <div class="container p-lg-5 p-md-5 py-md-3 p-sm-3 p-3">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h1 class="title-xl">{{__('general.gallery')}}</h1>
            </div>
        </div>
        <div class="row align-items-center mb-5">
        <div class="row mx-0 p-0 max-height-gallery" data-lightbox="gallery">
            
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/initiatives/news.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/initiatives/news.png')}}" alt="Gallery Image" class="gallery-img" />
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/initiatives/news.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/initiatives/news.png')}}" alt="Gallery Image" class="gallery-img" />
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/initiatives/news.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/initiatives/news.png')}}" alt="Gallery Image" class="gallery-img" />
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/initiatives/news.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/initiatives/news.png')}}" alt="Gallery Image" class="gallery-img" />
                </a>
            </div>
        </div>
        </div>
        
        <div class="w-100 bb-orange py-5"></div>

    </div>

    <div class="container p-lg-5 p-md-5 p-sm-3 p-3 row align-items-center mx-auto">
        <div class="row align-items-center data-sm text-orange">
            <b class="col-auto pe-5">{{__('general.share')}}</b>
            <div class="col-auto px-2 fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size="">
                <a class="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('initiatives.view')}}">
                    <img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/>
                </a>
            </div>       
            <!--a class="col-auto px-2"  onclick="shareLinkedIn(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="25" width="25"/></a-->
            <a class="col-auto px-2" href="" onclick="shareTwitter(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
        </div>


        <div class="py-5 ">
            <p class="data-sm text-orange py-2"><b>{{__('initiatives.view.links')}}</b></p>
            <p class="py-2"><a href="" class="text-link text-white">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
            <p class="py-2"><a href="" class="text-link text-white">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
            <p class="py-2"><a href="" class="text-link text-white">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
        </div>
    </div>



</section>
@endsection
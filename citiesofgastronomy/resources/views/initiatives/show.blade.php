<!-- resources/views/initiatives/show.blade.php -->

@extends('commons.base')

@section('content')
<section id="show_initiative">
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
                    <div class="pb-">
                        <img src="{{asset('assets/img/number/2.png')}}" width="35" height="35"/>
                        <img src="{{asset('assets/img/number/4.png')}}" width="35" height="35"/>
                        <img src="{{asset('assets/img/number/6.png')}}" width="35" height="35"/>
                    </div>
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
        <div class="row align-items-center mb-5">
        <div class="row mx-0 p-0 max-height-gallery" data-lightbox="gallery">
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/initiatives/news.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/initiatives/news.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/initiatives/news.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/initiatives/news.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/initiatives/news.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/initiatives/news.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('storage/initiatives/news.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('storage/initiatives/news.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
        </div>
        </div>
        
        <div class="w-100 bb-orange py-5"></div>

    </div>

    <div class="container p-5 row align-items-center">
        <div class="row align-items-center data-sm text-orange">
            <b class="col-auto pe-5">{{__('initiatives.view.share')}}</b>
            <div class="col-auto px-2 fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size="">
                <a class="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('initiatives.index')}}">
                    <img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/>
                </a>
            </div>       
            <a class="col-auto px-2"  onclick="shareLinkedIn(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="25" width="25"/></a>
            <a class="col-auto px-2" href="" onclick="shareTwitter(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
        </div>
        <!--a href="https://www.instagram.com/?url=https://www.drdrop.co/" target="_blank" rel="noopener">
            Share on instagram
        </a-->


        <div class="py-5 ">
            <p class="data-sm text-orange py-2"><b>{{__('initiatives.view.links')}}</b></p>
            <p class="py-2"><a href="" class="text-link text-white">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
            <p class="py-2"><a href="" class="text-link text-white">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
            <p class="py-2"><a href="" class="text-link text-white">Lorem ipsum dolor sit amet, consetetur sadipscing</a></p>
        </div>
    </div>



</section>
@endsection
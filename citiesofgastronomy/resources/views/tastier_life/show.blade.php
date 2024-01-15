<!-- resources/views/tastier_life/show.blade.php -->

@extends('commons.base')

@section('content')
<section id="show_tastierlife">
    <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title-sm mb-4">{{__('tastier_life.lorem_title')}}</h5>
                <h6 class="data-sm py-2">{{__('tastier_life.lorem_desc')}}</h6>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('tastier_life.data_city')}}</b>{{__('tastier_life.lorem_city')}}</h6>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('tastier_life.data_cat')}}</b>{{__('tastier_life.lorem_cat')}}</h6>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('tastier_life.data_chef')}}</b>{{__('tastier_life.lorem_chef')}}</h6>
                <div class="row align-items-start">
                    <div class="col-auto">
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linkedin.svg')}}" height="19" width="23"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/tiktok.svg')}}" height="19" width="23"/></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                <img src="{{asset('assets/img/Elements/sample2.png')}}" class="mx-auto my-auto w-100 br-9" alt="...">
            </div>
        </div>
    </div>

    <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 p-lg-5 p-md-5 p-sm-3 p-3">
                <div class="p-lg-5 p-md-5 p-sm-3 p-3 title-xs bg-orange text-white text-center">
                    <b>{{__('tastier_life.about_title')}}</b>
                </div>
                <div class="bg-gray text-left row px-3 py-5 mx-0">
                    <div class="row px-0 mx-0">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2">
                            <img class="w-100" src="{{asset('assets/icons/Icon_Difficulty.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10">
                            <p class="py-2 text-orange subtitle"><b>{{__('tastier_life.data_difficulty')}}</b></p>                    
                            <p class="py-2 text-white data">{{__('tastier_life.lorem_difficulty')}}</p>
                        </div>
                    </div>                    
                    <div class="row px-0 mx-0">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2">
                            <img class="w-100" src="{{asset('assets/icons/Icon_PrepTime.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10">
                            <p class="py-2 text-orange subtitle"><b>{{__('tastier_life.data_preptime')}}</b></p>
                            <p class="py-2 text-white data">{{__('tastier_life.lorem_preptime')}}</p>
                        </div>
                    </div>                  
                    <div class="row px-0 mx-0">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2">
                            <img class="w-100" src="{{asset('assets/icons/Icon_TotalTime.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10">
                            <p class="py-2 text-orange subtitle"><b>{{__('tastier_life.data_totaltime')}}</b></p>
                            <p class="py-2 text-white data">{{__('tastier_life.lorem_totaltime')}}</p>
                        </div>
                    </div>                    
                    <div class="row px-0 mx-0">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2">
                            <img class="w-100" src="{{asset('assets/icons/Icon_Servings.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10">
                            <p class="py-2 text-orange subtitle"><b>{{__('tastier_life.data_servings')}}</b></p>
                            <p class="py-2 text-white data">{{__('tastier_life.lorem_servings')}}</p>
                        </div>
                    </div>                    
                    <div class="row px-0 mx-0">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2">
                            <img class="w-100" src="{{asset('assets/icons/Icon_Ingredients.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10">        
                            <p class="py-2 text-orange subtitle"><b>{{__('tastier_life.data_ingredients')}}</b></p>
                            <p class=" text-white data">{{__('tastier_life.lorem_ingredients1')}}</p>
                            <p class=" text-white data">{{__('tastier_life.lorem_ingredients2')}}</p>
                            <p class=" text-white data">{{__('tastier_life.lorem_ingredients3')}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12 col-12 p-lg-5 p-md-5 p-sm-3 p-3">
                <p class="py-2 data ">{{__('tastier_life.lorem_text0')}}</p>
                <p class="py-2 data ">{{__('tastier_life.lorem_text1')}}</p>
                <p class="py-2 data ">{{__('tastier_life.lorem_text2')}}</p>
                <p class="py-2 data ">{{__('tastier_life.lorem_text3')}}</p>
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
            
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('assets/img/Elements/sample2.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('assets/img/Elements/sample2.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('assets/img/Elements/sample2.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('assets/img/Elements/sample2.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('assets/img/Elements/sample2.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('assets/img/Elements/sample2.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('assets/img/Elements/sample2.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('assets/img/Elements/sample2.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-6 p-2">
                <a class="grid-item" href="{{asset('assets/img/Elements/sample2.png')}}" data-lightbox="gallery-item" >
                    <img src="{{asset('assets/img/Elements/sample2.png')}}" alt="Gallery Image" class="gallery-img w-100 h-100" />
                </a>
            </div>
        </div>
        </div>
        
        <div class="w-100 bb-orange py-5"></div>

    </div>

    <div class="container p-lg-5 p-md-5 p-sm-3 p-3 row align-items-center">
        <div class="row align-items-center data-sm text-orange pb-5">
            <b class="col-auto pe-5">{{__('general.share')}}</b>
            <div class="col-auto px-2 fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size="">
                <a class="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('tastier_life.view')}}">
                    <img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/>
                </a>
            </div>       
            <!--a class="col-auto px-2"  onclick="shareLinkedIn(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="25" width="25"/></a-->
            <a class="col-auto px-2" href="" onclick="shareTwitter(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
        </div>
    </div>



</section>
@endsection
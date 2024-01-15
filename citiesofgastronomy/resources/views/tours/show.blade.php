<!-- resources/views/tours/show.blade.php -->

@extends('commons.base')

@section('content')
<section id="show_tour">
    <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title-sm mb-4">{{__('tours.lorem_title')}}</h5>
                <h6 class="data-sm py-2">{{__('tours.lorem_desc')}}</h6>
                <div class="row align-items-start">
                    <div class="col-auto">
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/youtube.svg')}}" height="19" width="23"/></a>
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
                <a class="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('tours.view')}}">
                    <img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/>
                </a>
            </div>       
            <!--a class="col-auto px-2"  onclick="shareLinkedIn(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="25" width="25"/></a-->
            <a class="col-auto px-2" href="" onclick="shareTwitter(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
        </div>
    </div>
    

</section>
@endsection
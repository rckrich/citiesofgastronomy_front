<!-- resources/views/tours/show.blade.php -->

@extends('commons.base')

@section('content')
<section id="show_tour">
    <div class="container p-lg-5 p-md-5 pb-md-3 p-sm-3 p-3">
        <div class="my-5 row px-0 mx-0 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title-sm mb-4">{{$name}}</h5>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('tours.data_city')}}</b>{{$cityName}}</h6>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('tours.data_agency')}}</b>{{$agency}}</h6>
                <h6 class="data-sm py-2">{!!$description!!}</h6>
                <div class="row align-items-start">
                    <div class="col-auto">
                        @foreach($social_network as $s)
                        <a href="{{$s['social_network']}}" target="_blank" class="px-2"><img class="icon-social" 
                        <?php
                            switch($s['idSocialNetworkType']){
                                case 1:
                                    echo("src="."\"".asset('assets/icons/facebook.svg')."\"");
                                    break;
                                case 2:
                                    echo("src="."\"".asset('assets/icons/twitter.svg')."\"");
                                    break;
                                case 3:
                                    echo("src="."\"".asset('assets/icons/tiktok.svg')."\"");
                                    break;
                                case 4:
                                    echo("src="."\"".asset('assets/icons/instagram.svg')."\"");
                                    break;
                                case 5:                        
                                    echo("src="."\"".asset('assets/icons/youtube.svg')."\"");
                                    break;
                                case 6:
                                    echo("src="."\"".asset('assets/icons/linked_in.svg')."\"");
                                    break;
                            }
                        ?> 
                        height="25" width="25"/></a>
                        @endforeach
                        <!--a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/youtube.svg')}}" height="19" width="23"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/tiktok.svg')}}" height="19" width="23"/></a-->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                <img src="{{config('app.url').$photo}}" class="mx-auto my-auto w-100 br-9" alt="...">
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
            @if($gallery)
            <div class="row mx-0 p-0 max-height-gallery" data-lightbox="gallery">
                @foreach($gallery as $img)
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                    <a class="grid-item" href="{{config('app.url').$img['image']}}" data-lightbox="gallery-item" >
                        <img src="{{config('app.url').$img['image']}}" alt="Gallery Image" class="gallery-img" />
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <p class="">{{__('general.no_gallery')}}</p>
            @endif
            </div>
        </div>
        <div class="w-100 bb-orange py-5"></div>

    </div>

    <div class="container p-lg-5 p-md-5 p-sm-3 p-3 row align-items-center mx-auto">
        <div class="row align-items-center data-sm text-orange pb-5">
            <b class="col-auto pe-5">{{__('general.share')}}</b>
            <div class="col-auto px-2 fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size="">
                <a class="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('tours.view',['id'=>$id])}}">
                    <img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/>
                </a>
            </div>       
            <!--a class="col-auto px-2"  onclick="shareLinkedIn(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="25" width="25"/></a-->
            <a class="col-auto px-2" href="" onclick="shareTwitter(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
        </div>
    </div>
    

</section>
@endsection
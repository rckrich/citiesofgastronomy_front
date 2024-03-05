<!-- resources/views/landing/contact.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_contact">

        <div id="contactCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <?php $i=0?>
                @foreach($banners as $banner)
                    <button type="button" data-bs-target="#contactCarousel" data-bs-slide-to="<?= $i?>" class="mx-2<?php
                    if($i == 0){echo ' active" aria-current="true';}?>" aria-label="Slide <?= $i?>"></button>
                    <?php $i = $i+1;?>
                @endforeach
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-white">{{__('contact.title')}}</h1>
                </div>
            </div>
            </div>
            <div class="carousel-inner">
                <?php $i=0?>
                @foreach($banners as $banner)
                <div class="carousel-item <?php if($i == 0){echo 'active';}?>" data-bs-interval="4000">
                    <img src="{{config('app.url').$banner['banner']}}"/>
                </div>
                <?php $i = $i+1;?>
                @endforeach
            </div>
        </div>

        <div class="container py-lg-5 py-md-5 py-sm-3 p-3">
            <div id="contact-cards" class="row g-lg-4 g-md-4 g-sm-5 g-5 py-5 col-12 mx-auto">
                <?php $cls = [1=>'fb', 2=>'tw', 3=>'tt', 4=>'in', 5=>'yt', 6=>'lin']?>
                @foreach($contacts as $city)
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{ $city["name"] }}</h5>
                            <!-- -->
                            @foreach($city["contacts"] as $contact)
                            <div class="mb-3">
                                <p class="card-text mb-0">{{ $contact["name"] }}</p>
                                <p class="card-text mb-2">{{ $contact["position"] }}</p>
                                @if(count($contact["social_network"])!=0)
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto b-2">
                                    @foreach($contact["social_network"] as $social)
                                    <?php   $id = $social["idSocialNetworkType"];
                                            $soc = $social["social_network_type"];
                                    ?>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2 icon-link">
                                            <img class="icon-social {{$cls[$id]}} " src="{{asset('assets/icons/'.$soc[0]['icon'])}}"
                                                height="25" width="25"/>
                                    </a>
                                    <!--<a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>-->
                                    @endforeach
                                </div>
                                </div>
                                @endif
                            </div>
                            @endforeach
                            <!-- -->
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- --->
                <!--
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-0">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto mt-2 mb-4">
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social fb" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social in" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social tw" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-lg-1 px-md-1 px-sm-2 px-2"><img class="icon-social lin" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 -->

            </div>
        </div>



    </section>
@endsection

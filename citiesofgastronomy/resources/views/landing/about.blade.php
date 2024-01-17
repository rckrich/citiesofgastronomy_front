<!-- resources/views/landing/about.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_about">

        <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
            <?php $i=0?>
                @foreach($banners as $banner)
                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="<?= $i?>" class="mx-2<?php
                if($i == 0){echo ' active" aria-current="true';}?>" aria-label="Slide <?= $i?>"></button>
                <?php $i = $i+1;?>
                @endforeach
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('about.title')}}</h1>
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

        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <p>{{__('about.desc')}}</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                @if($bannerAbout =='')
                <img src="{{asset('assets/img/Home/sample.png')}}" class="mx-auto my-auto w-100 br-9" alt="...">
                @else
                <img src="{{config('app.url').$bannerAbout}}" class="mx-auto my-auto w-100 br-9" alt="...">
                @endif
            </div>
            

        </div>
        </div>

        <div class="bg-dark-gray">
            <div class="container p-lg-5 p-md-5 p-sm-3 p-3 bg-dark-gray">
                <div class="min-h-80 row px-0 mx-0 align-items-center">
                    <div class="row mt-5 mx-0">
                        <div class="col-lg-6 col-12 mb-5">
                            <div class="card p-lg-4 p-md-4 p-sm-3 p-3 bg-orange h-100">
                            <div class="card-body text-white">
                                <h5 class="title-md"><b>{{__('landing.stats.subtitle_1')}}</b></h5>
                                <p class="">{{__('landing.stats.text_1')}}</p>
                                <p class="">
                                    <ul>
                                        <li>{{__('landing.stats.text_1_li1')}}</li>
                                        <li>{{__('landing.stats.text_1_li2')}}</li>
                                        <li>{{__('landing.stats.text_1_li3')}}</li>
                                        <li>{{__('landing.stats.text_1_li4')}}</li>
                                        <li>{{__('landing.stats.text_1_li5')}}</li>
                                        <li>{{__('landing.stats.text_1_li6')}}</li>
                                    </ul>
                                </p>
                                
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-5">
                            <div class="card p-lg-4 p-md-4 p-sm-3 p-3 bg-blue h-100">
                            <div class="card-body text-white">
                                <h5 class="title-md"><b>{{__('landing.stats.subtitle_2')}}</b></h5>
                                <p class="">{{__('landing.stats.text_2')}}</p>
                                <a target="_blank" href="https://en.unesco.org/creative-cities/" class="btn btn-primary">{{__('landing.btn_explore')}}</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="p-lg-5 p-md-5 p-sm-3 p-3">

        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row align-items-center mb-lg-5 mb-md-5 mb-sm-3 mb-3 pt-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('about.faq.title')}}</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-12">

                    <div class="accordion" id="accordionFAQ">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            {{__('about.lorem')}}
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            {{__('about.lorem')}}
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            {{__('about.lorem')}}
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row align-items-center mb-lg-5 mb-md-5 mb-sm-3 mb-3">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('about.timeline.title')}}</h1>
                </div>
            </div>
            <div class="row align-items-center">
                
                <div class="table-responsive px-0">
                    <table id="timeline-list" class="table table-dark w-100">
                        <tbody>
                                    
                        @foreach($timeline as $time)

                            <tr class="timeline-item">
                                <td class="timeline-col timeline-title text-left ps-3 mx-2
                                    {{ $time['monthNum'] == 1 || $time['monthNum'] == 7 ? 'bl-1':''}} 
                                    {{ $time['monthNum'] == 2 || $time['monthNum'] == 8 ? 'bl-2':''}} 
                                    {{ $time['monthNum'] == 3 || $time['monthNum'] == 9 ? 'bl-3':''}} 
                                    {{ $time['monthNum'] == 4 || $time['monthNum'] == 10 ? 'bl-4':''}} 
                                    {{ $time['monthNum'] == 5 || $time['monthNum'] == 11 ? 'bl-5':''}} 
                                    {{ $time['monthNum'] == 6 || $time['monthNum'] == 12 ? 'bl-6':''}} ">
                                    <?= $time["tittle"]?>
                                </td>
                                <td class="timeline-col timeline-icon text-center">
                                    <a <?php if($time["link"]){echo 'href="'.$time["link"].'"';};?> target="_blank">
                                        <img class="mx-auto visible-icon" src="<?php
                                        if(!$time["link"]){echo asset('assets/icons/visibility_off.svg');}
                                        else{echo asset('assets/icons/visibility.svg');};?>"/>
                                    </a>
                                </td>
                                <td class="timeline-col timeline-date text-center"><?= $time["startDateFormat"]?> <?php
                                    if($time["endDateFormat"]){echo ' - '.$time["endDateFormat"];};//14.Jan.2024?>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>

        </div>




    </section>
@endsection

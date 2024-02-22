<!-- resources/views/landing/initiatives.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_initiatives">

        <div id="initiativesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">

            <?php $i=0?>
                @foreach($banners as $banner)
                    <button type="button" data-bs-target="#initiativesCarousel" data-bs-slide-to="<?= $i?>" class="mx-2<?php
                    if($i == 0){echo ' active" aria-current="true';}?>" aria-label="Slide <?= $i?>"></button>
                    <?php $i = $i+1;?>
                @endforeach
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('initiatives.title')}}</h1>
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

        <div class="container px-lg-5 px-md-5 px-sm-3 px-3 pt-5 filters">
        <div class="row g-6">
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 pe-lg-1 ps-lg-2 px-md-1 px-sm-1 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select">
                        <option id="filter-0" name="filter-0" value="0">Cities</option>
                        <option id="filter-1" name="filter-1" value="0">a city</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select">
                        <option id="filter-0" name="filter-0" value="0">Type of Activity</option>
                        @foreach($typeOfActivity as $actype)
                        <option id="filter-{{$actype['id']}}" name="filter-{{$actype['id']}}" value="{{$actype['id']}}">{{$actype['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select">
                        <option id="filter-0" name="filter-0" value="0">Topics</option>
                        @foreach($Topics as $topic)
                        <option id="filter-{{$topic['id']}}" name="filter-{{$topic['id']}}" value="{{$topic['id']}}">{{$topic['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select">
                        <option id="filter-0" name="filter-0" value="0">SDG</option>
                        @foreach($sdgs as $sdg)
                        <option id="filter-{{$sdg['id']}}" name="filter-{{$sdg['id']}}" value="{{$sdg['id']}}">{{$sdg['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select">
                        <option id="filter-0" name="filter-0" value="0">Connection to other creative fields</option>
                        @foreach($ConnectionsToOther as $cn)
                        <option id="filter-{{$cn['id']}}" name="filter-{{$cn['id']}}" value="{{$cn['id']}}">{{$cn['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 ps-lg-1 pe-lg-2 px-md-1 px-sm-1 px-1 my-3">
                <button class="btn btn-info w-100 h-100">Filter posts</button>
            </div>
        </div>
        <div id="clear-filters-btn" class="row d-none">
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 pe-lg-1 ps-lg-2 px-md-1 px-sm-1 px-1 mb-3 text-left">
                <label class="badge bg-blue text-white hover-pointer px-5 py-3 text-center" onclick="resetFilters()">
                    {{__('general.clear_filters')}}  X
                </label>
            </div>
        </div>
        </div>

        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="row g-4">
                @foreach($initiatives as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{route('initiatives.view')}}" class="img-link">
                            <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{$item["name"]}}</h5>
                            <p class="card-text mb-2">{{$item["description"]}}</p>
                            @if( count ($item["sdg_filter"]) != 0)
                            <div class="py-3">
                                @foreach($item["sdg_filter"] as $sdg)
                                <img src="{{asset('assets/img/number/' . $sdg['sdg_datta']['number'] . '.png')}}" width="35" height="35"/>
                                @endforeach
                            </div>
                            @endif
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">
                                @foreach($item["type_filter"] as $type)
                                    {{$type['type_datta']['name']}}
                                    @if(!$loop->last),@endif
                                @endforeach
                            </p>
                            <a href="{{route('initiatives.view')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @if( count ($initiatives) == 0)
                <div>
                    <p class="text-center">{{__('general.no_results')}}</p>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection

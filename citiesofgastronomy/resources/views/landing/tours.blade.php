<!-- resources/views/landing/projects.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_projects">

        <div id="toursCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">

            <?php $i=0?>
                @foreach($banners as $banner)
                    <button type="button" data-bs-target="#toursCarousel" data-bs-slide-to="<?= $i?>" class="mx-2<?php
                    if($i == 0){echo ' active" aria-current="true';}?>" aria-label="Slide <?= $i?>"></button>
                    <?php $i = $i+1;?>
                @endforeach

            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-white">{{__('tours.title')}}</h1>
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

        @include('commons.work_in_progress')

        <!--div class="container px-lg-5 px-md-5 px-sm-3 px-3 pt-5 filters">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 me-auto">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">City</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-6 ms-auto">
                <button class="btn btn-info w-100 h-100">Filter posts</button>
            </div>
        </div>
        </div>

        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Elements/sample2.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('tours.lorem_title')}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_agency')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_city')}}</b>Name</p>
                            <p class="card-text mb-2">{{__('tours.lorem')}}</p>
                            <a href="{{route('tours.view')}}" class="btn btn-link px-0">{{__('tours.btn_more')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Elements/sample2.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('tours.lorem_title')}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_agency')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_city')}}</b>Name</p>
                            <p class="card-text mb-2">{{__('tours.lorem')}}</p>
                            <a href="{{route('tours.view')}}" class="btn btn-link px-0">{{__('tours.btn_more')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Elements/sample2.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('tours.lorem_title')}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_agency')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_city')}}</b>Name</p>
                            <p class="card-text mb-2">{{__('tours.lorem')}}</p>
                            <a href="{{route('tours.view')}}" class="btn btn-link px-0">{{__('tours.btn_more')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Elements/sample2.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('tours.lorem_title')}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_agency')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_city')}}</b>Name</p>
                            <p class="card-text mb-2">{{__('tours.lorem')}}</p>
                            <a href="{{route('tours.view')}}" class="btn btn-link px-0">{{__('tours.btn_more')}}</a>
                        </div>
                    </div>
                </div>


            </div>
        </div-->


    </section>
@endsection

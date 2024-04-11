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


        <div class="container px-lg-5 px-md-5 px-sm-3 px-3 pt-5 filters">
        <div class="row g-4">
        <form action="{{url('/tours')}}" method="POST" id="searchForm_tours" class="d-contents">
        @csrf
            <div class="col-lg-4 col-md-6 col-sm-6 col-6 me-auto">
                <div class="form-group">
                    <select id="data_city" name="data_city" class="form-control filter-select <?php if($selectedCity!='default'){echo 'changed';}?>" placeholder="">
                        <option <?php if($selectedCity=='default'){echo 'selected';}?> 
                            value="default">{{__('tastier_life.user.select_city')}}
                        </option>
                        @foreach($citiesList as $city)
                        <option id="filter-{{$city['id']}}" name="filter-{{$city['id']}}" 
                            <?php if($selectedCity==$city['id']){echo 'selected';}?> 
                            value="{{$city['id']}}">{{$city['name']}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 col-6 ms-auto">
                <button type="submit"  class="btn btn-info w-100 h-100">Filter posts</button>
            </div>
        <form>
        </div>
        <div id="clear-filters-btn" class="row d-none">
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 pe-lg-1 ps-lg-2 px-md-1 px-sm-1 px-1 my-3 text-left">
                <label class="badge bg-blue text-white hover-pointer px-5 py-3 text-center" onclick="reloadPage()">
                    {{__('general.clear_filters')}}  X
                </label>
            </div>
        </div>
        </div>

        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="row g-4">
            @foreach($tours as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <a href="{{route('tours.view',['id'=>$item['id']])}}" class="img-link">
                            @if($item['photo']!=null || $item['photo'] != '')
                            <img src="{{config('app.url').$item['photo']}}" class="card-img-top" alt="...">
                            @else
                            <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                            @endif
                        </a>                        
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{$item['name']}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_agency')}}</b>{{$item['travelAgency']}}</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tours.data_city')}}</b>{{$item['cityName']}}</p>
                            <p class="card-text mb-2">
                            {{
                                str_replace(['<br />','&nbsp;'], ' ', 
                                nl2br(htmlspecialchars_decode(html_entity_decode(strip_tags($item["description"]))))
                                )
                            }}
                            </p>
                            <a href="{{route('tours.view',['id'=>$item['id']])}}" class="btn btn-link px-0">{{__('tours.btn_more')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>


    </section>
    <script>
        $(document).ready(function(e){
            let city = "<?= $selectedCity?>";

            if(city != 'default'){
                showResetFilterButton();
            }
            else{hideResetFilterButton();}
        });
        
        function reloadPage(){
            window.location = '../../tours';
        }
    </script>
@endsection

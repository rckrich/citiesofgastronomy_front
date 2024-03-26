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
                    <h1 class="title-lg text-white">{{__('initiatives.title')}}</h1>
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
        <form action="{{url('/initiatives')}}" method="POST" id="searchForm_ini" class="d-contents">
        @csrf
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 pe-lg-1 ps-lg-2 px-md-1 px-sm-1 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select" name="select_city_filter">
                        <option <?php if($search_inputs['city']=='default'){echo 'selected';}?>
                            value="default">{{__('initiatives.user.select_city')}}</option>
                        @foreach($cities as $city)
                        <option id="filter-{{$city['id']}}" name="filter-{{$city['id']}}" <?php if($search_inputs['city']==$city['id']){echo 'selected';}?> 
                            value="{{$city['id']}}">{{$city['name']}}, {{$city['country']}}</option>
                        @endforeach
                    </select>
                        
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select" name="select_activity_filter">
                        <option <?php if($search_inputs['actype']=='default'){echo 'selected';}?>
                            value="default">{{__('initiatives.user.select_activity')}}</option>
                        @foreach($typeOfActivity as $actype)
                        <option id="filter-{{$actype['id']}}" name="filter-{{$actype['id']}}" <?php if($search_inputs['actype']==$actype['id']){echo 'selected';}?> 
                            value="{{$actype['id']}}">{{$actype['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select" name="select_topic_filter">
                        <option <?php if($search_inputs['topic']=='default'){echo 'selected';}?>  
                            value="default">{{__('initiatives.user.select_topic')}}</option>
                        @foreach($Topics as $topic)
                        <option id="filter-{{$topic['id']}}" name="filter-{{$topic['id']}}" <?php if($search_inputs['topic']==$topic['id']){echo 'selected';}?> 
                            value="{{$topic['id']}}">{{$topic['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select" name="select_sdg_filter">
                        <option <?php if($search_inputs['sdg']=='default'){echo 'selected';}?>  
                            value="default">{{__('initiatives.user.select_sdg')}}</option>
                        @foreach($sdgs as $sdg)
                        <option id="filter-{{$sdg['id']}}" name="filter-{{$sdg['id']}}" <?php if($search_inputs['sdg']==$sdg['id']){echo 'selected';}?> 
                            value="{{$sdg['id']}}">{{$sdg['number']}} - {{$sdg['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 px-1 my-3">
                <div class="form-group">
                    <select class="form-control filter-select" name="select_connection_filter">
                        <option <?php if($search_inputs['connection']=='default'){echo 'selected';}?> 
                            value="default">{{__('initiatives.user.select_connection')}}</option>
                        @foreach($ConnectionsToOther as $cn)
                        <option id="filter-{{$cn['id']}}" name="filter-{{$cn['id']}}" <?php if($search_inputs['connection']==$cn['id']){echo 'selected';}?>
                            value="{{$cn['id']}}">{{$cn['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 ps-lg-1 pe-lg-2 px-md-1 px-sm-1 px-1 my-3">
                <button type="submit" class="btn btn-info w-100 h-100">{{__('general.btn_filter')}}</button>
            </div>
        </form>
        </div>
        <div id="clear-filters-btn" class="row d-none">
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 pe-lg-1 ps-lg-2 px-md-1 px-sm-1 px-1 mb-3 text-left">
                <label class="badge bg-blue text-white hover-pointer px-5 py-3 text-center" onclick="reloadPage()">
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
                        <a href="{{route('initiatives.view',['id'=>$item['id']])}}" class="img-link">
                            @if($item['photo']!=null || $item['photo'] != '')
                            <img src="{{config('app.url').$item['photo']}}" class="card-img-top" alt="...">
                            @else
                            <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                            @endif
                        </a>
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{$item["name"]}}</h5>
                            <p class="card-text mb-2">{{
                                str_replace(['<br />','&nbsp;'], ' ', 
                                nl2br(htmlspecialchars_decode(html_entity_decode(strip_tags($item["description"]))))
                                )
                            }}</p>
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
                                    {{$type['type_datta']['name'].(!$loop->last?',':'')}}
                                @endforeach
                            </p>
                            <a href="{{route('initiatives.view',['id'=>$item['id']])}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
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


    <script>
        $(document).ready(function(e){
            let city = "<?= $search_inputs['city']?>";
            let actype = "<?= $search_inputs['actype']?>";
            let topic = "<?= $search_inputs['topic']?>";
            let sdg = "<?= $search_inputs['sdg']?>";
            let connection = "<?= $search_inputs['connection']?>";

            if(city !='default' || actype != 'default' || topic != 'default' || sdg != 'default' || connection != 'default'){
                showResetFilterButton();
            }
            else{hideResetFilterButton();}
        });

        function reloadPage(){
            window.location = '../../initiatives';
        }
    </script>

@endsection
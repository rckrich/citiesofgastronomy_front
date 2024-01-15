<!-- resources/views/landing/cities.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_cities">

        <div id="citiesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <?php $i=0?>
                @foreach($banners as $banner)
                <?php $e = $i+1;?>
                <button type="button" data-bs-target="#citiesCarousel" data-bs-slide-to="<?= $i?>" class="mx-2 <?php if($i == 0){echo 'active';}?>" aria-current="true" aria-label="Slide <?= $e?>"></button>
                <?php $i = $i+1;?>
                @endforeach
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('cities.title')}}</h1>
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

        <div class="container py-5">
            <div class="row g-5 py-lg-5 py-md-5 py-sm-5 py-3 col-12 mx-auto">

                @foreach($cityList as $city)
                    <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                        <a class="card-link" <?php if($city['completeInfo'] == 1){echo ' href="/cities/view/'.$city['id'].'"';}?>>
                        <div class="card h-100">
                            @if($city['photo'])
                            <img src="{{config('app.url').$city['photo']}}" class="card-img-top" alt="...">
                            @else
                            <img src="{{asset('assets/img/default.jpg')}}" class="card-img-top" alt="">
                            @endif
                            <div class="card-body px-0 py-2 bg-black text-white text-center">
                                <h5 class="card-title my-2">{{$city["name"]}} </h5>
                                <p class="card-text mb-2">{{$city["country"]}}</p>
                                <p class="card-text mb-2">{{$city["continentName"]}}</p>
                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>


    </section>
@endsection

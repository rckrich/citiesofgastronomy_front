<!-- resources/views/landing/cities.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_cities">

        <div id="citiesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#citiesCarousel" data-bs-slide-to="0" class="mx-2 active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#citiesCarousel" data-bs-slide-to="1" class="mx-2" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#citiesCarousel" data-bs-slide-to="2" class="mx-2" aria-label="Slide 3"></button>
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('cities.title')}}</h1>
                </div>
            </div>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('assets/img/Banners/IMG_Cities.png')}}"/>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/img/Banners/IMG_Cities.png')}}"/>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/img/Banners/IMG_Cities.png')}}"/>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row g-5 py-5 col-12 mx-auto">
                <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                    <div class="card h-100">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('cities.title_sample')}}</h5>
                            <p class="card-text mb-2">{{__('cities.text_sample')}}</p>
                            <p class="card-text mb-2">{{__('cities.text_sample2')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                    <div class="card h-100">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('cities.title_sample_lg')}}</h5>
                            <p class="card-text mb-2">{{__('cities.text_sample')}}</p>
                            <p class="card-text mb-2">{{__('cities.text_sample2')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                    <div class="card h-100">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('cities.title_sample')}}</h5>
                            <p class="card-text mb-2">{{__('cities.text_sample')}}</p>
                            <p class="card-text mb-2">{{__('cities.text_sample2')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                    <div class="card h-100">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('cities.title_sample')}}</h5>
                            <p class="card-text mb-2">{{__('cities.text_sample')}}</p>
                            <p class="card-text mb-2">{{__('cities.text_sample2')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                    <div class="card h-100">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('cities.title_sample')}}</h5>
                            <p class="card-text mb-2">{{__('cities.text_sample')}}</p>
                            <p class="card-text mb-2">{{__('cities.text_sample2')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                    <div class="card h-100">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('cities.title_sample')}}</h5>
                            <p class="card-text mb-2">{{__('cities.text_sample')}}</p>
                            <p class="card-text mb-2">{{__('cities.text_sample2')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                    <div class="card h-100">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('cities.title_sample')}}</h5>
                            <p class="card-text mb-2">{{__('cities.text_sample')}}</p>
                            <p class="card-text mb-2">{{__('cities.text_sample2')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-auto col-md-4 col-sm-6 col-12">
                    <div class="card h-100">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('cities.title_sample')}}</h5>
                            <p class="card-text mb-2">{{__('cities.text_sample')}}</p>
                            <p class="card-text mb-2">{{__('cities.text_sample2')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection
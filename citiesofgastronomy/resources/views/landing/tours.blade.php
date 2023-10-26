<!-- resources/views/landing/projects.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_projects">

        <div id="toursCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#toursCarousel" data-bs-slide-to="0" class="mx-2 active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#toursCarousel" data-bs-slide-to="1" class="mx-2" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#toursCarousel" data-bs-slide-to="2" class="mx-2" aria-label="Slide 3"></button>
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('tours.title')}}</h1>
                </div>
            </div>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('assets/img/Banners/IMG_Tours.png')}}"/>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/img/Banners/IMG_Tours.png')}}"/>
                </div>
                <div class="carousel-item">
                    <img src="{{asset('assets/img/Banners/IMG_Tours.png')}}"/>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- resources/views/landing/initiatives.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_initiatives">

        <div id="initiativesCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#initiativesCarousel" data-bs-slide-to="0" class="mx-2 active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#initiativesCarousel" data-bs-slide-to="1" class="mx-2" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#initiativesCarousel" data-bs-slide-to="2" class="mx-2" aria-label="Slide 3"></button>
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('initiatives.title')}}</h1>
                </div>
            </div>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="{{asset('assets/img/Banners/IMG_Initiatives.png')}}"/>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{asset('assets/img/Banners/IMG_Initiatives.png')}}"/>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{asset('assets/img/Banners/IMG_Initiatives.png')}}"/>
                </div>
            </div>
        </div>

        <div class="container px-5 pt-5 filters">
        <div class="row g-6">
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 my-3">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">Cities</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 my-3">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">Type of Activity</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 my-3">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">Topics</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 my-3">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">SDG</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 my-3">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">Connection to other creative fields</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6 col-6 my-3">
                <button class="btn btn-info w-100 h-100">Filter posts</button>
            </div>
        </div>
        </div>

        <div class="container p-5">
        <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.index')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.index')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.index')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.index')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <div class="py-3">
                                <img src="{{asset('assets/img/number/3.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/10.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/13.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/14.png')}}" width="35" height="35"/>
                                <img src="{{asset('assets/img/number/16.png')}}" width="35" height="35"/>
                            </div>
                            <h6 class="text-blue activity mb-2"><b>{{__('landing.activity_type')}}</b></h6>
                            <p class="card-text mb-2">{{__('landing.initiatives.lorem_activity')}}</p>
                            <a href="{{route('initiatives.index')}}" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
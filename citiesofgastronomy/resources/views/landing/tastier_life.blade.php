<!-- resources/views/landing/tastier_life.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_tastier_life">

        <div id="tlifeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#tlifeCarousel" data-bs-slide-to="0" class="mx-2 active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#tlifeCarousel" data-bs-slide-to="1" class="mx-2" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#tlifeCarousel" data-bs-slide-to="2" class="mx-2" aria-label="Slide 3"></button>
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('tastier_life.title')}}</h1>
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

        <div class="container px-5 pt-5 filters">
        <div class="row g-4 px-5">
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">Category</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">City</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <div class="form-group">
                    <select class="form-control">
                        <option id="filter-" name="filter-" value="0">Chef Name</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                <button class="btn btn-info w-100 h-100">Filter posts</button>
            </div>
        </div>
        </div>

        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="row g-4 px-5">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Elements/sample2.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('tastier_life.lorem_title')}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_chef')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_city')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_cat')}}</b>Name</p>
                            <a href="{{route('tastier_life.view')}}" class="btn btn-link px-0">{{__('tastier_life.btn_more')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Elements/sample2.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('tastier_life.lorem_title')}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_chef')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_city')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_cat')}}</b>Name</p>
                            <a href="{{route('tastier_life.view')}}" class="btn btn-link px-0">{{__('tastier_life.btn_more')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Elements/sample2.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('tastier_life.lorem_title')}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_chef')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_city')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_cat')}}</b>Name</p>
                            <a href="{{route('tastier_life.view')}}" class="btn btn-link px-0">{{__('tastier_life.btn_more')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Elements/sample2.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{__('tastier_life.lorem_title')}}</h5>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_chef')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_city')}}</b>Name</p>
                            <p class="card-text mb-2"><b class="text-blue">{{__('tastier_life.data_cat')}}</b>Name</p>
                            <a href="{{route('tastier_life.view')}}" class="btn btn-link px-0">{{__('tastier_life.btn_more')}}</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>

    </section>
@endsection

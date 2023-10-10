<!-- resources/views/landing/home.blade.php -->

@extends('commons.base')

@section('content')
    <section id="map">
    <div>
        <div class="d-block">
            <div class="row align-items-center mx-0 px-0">

                <!-- el viewBox 450 cambia el tamaño de la vista del heigth de la imagen con los botones -->
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
                viewBox="0 0 1056 450" style="enable-background:new 0 0 1056 816;" xml:space="preserve"
                style="position:absolute;vertical-align:middle">                    
                    <svg id="pin-1" class="pin" x="350" y="250"  onclick="openMapModal()" xmlns="http://www.w3.org/2000/svg" width="18.095" height="22.024" viewBox="0 0 18.095 22.024">
                        <path id="Trazado_17" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#fff"/>
                    </svg>
                    <svg id="pin-2" class="pin" x="550" y="250"  onclick="openMapModal()" xmlns="http://www.w3.org/2000/svg" width="18.095" height="22.024" viewBox="0 0 18.095 22.024">
                        <path id="Trazado_17" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#fff"/>
                    </svg>   
                </svg>

                <svg id="pin-1" class="pin" x="350" y="250"  onclick="openMapModal()" xmlns="http://www.w3.org/2000/svg" width="18.095" height="22.024" viewBox="0 0 18.095 22.024">
                    <path id="Trazado_17" data-name="Trazado 17" d="M9.05,0A9.049,9.049,0,0,0,0,9.05c0,3.609,4.727,9.326,7.347,12.221a2.3,2.3,0,0,0,3.4,0c2.619-2.891,7.347-8.608,7.347-12.221A9.048,9.048,0,0,0,9.05,0Zm0,13.119A3.618,3.618,0,1,1,12.668,9.5,3.619,3.619,0,0,1,9.05,13.119Z" fill="#fff"/>
                </svg>

                <!--div class="map-title-overlay row align-items-start mx-0">
                    <h1 class="title-lg text-yellow">{{__('landing.map.title')}}</h1>
                </div-->
                <div id="map-card" class="map-title-overlay row align-items-center mx-auto">
                    <div class="card" style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">{{__('landing.btn_explore')}}</a>
                        </div>
                    </div>
                </div>
                <div class="map-title-overlay row align-items-end mx-0">
                    <a class="btn btn-primary" href="{{route('landing.cities')}}">{{__('landing.map.title')}}</a>
                </div>
                <img id="map-background" class="px-0" style="width: auto; height: auto; max-width: 100%;vertical-align:middle" src="{{asset('assets/img/map.png')}}">
            </div>
        </div>
    </div>
    </section>

    <section id="about" class="container p-5 selectable-text-area">
        <div class="min-h-100 row px-0 mx-0 align-items-center">
            <h1 class="title-xl text-yellow text-center">{{__('landing.about.title')}}</h1>
            <div class="row text-white">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h2 class="title-sm">{{__('landing.about.subtitle')}}</h2>
                    <p>{{__('landing.lorem')}}</p>
                    <a class="btn btn-primary" href="{{route('landing.about')}}">{{__('landing.btn_learn')}}</a>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5">
                    <img src="{{asset('assets/img/Home/sample.png')}}" class="mx-auto my-auto w-100 br-9" alt="...">
                </div>

            </div>
        </div>

    </section>

    <section id="num_stats" class="bg-dark-gray selectable-text-area">
        <div class="banner-title ">
        <div class="banner-title-overlay row align-items-center mx-0">
            <div class="banner-img-overlay">
                <h1 class="title-lg text-yellow2">{{__('landing.stats.title')}}</h1>
            </div>
        </div>
        </div>
        <div class="container p-5">
        <div class="min-h-100 row px-0 mx-0 align-items-center">
            <div class="row mt-5">
                <div class="col-lg-6 col-12 mb-5">
                    <div class="card p-5 bg-orange h-100">
                    <div class="card-body text-white">
                        <h5 class="title-md"><b>{{__('landing.stats.subtitle_1')}}</b></h5>
                        <p class="">{{__('landing.lorem')}}</p>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-5">
                    <div class="card p-5 bg-blue h-100">
                    <div class="card-body text-white">
                        <h5 class="title-md"><b>{{__('landing.stats.subtitle_2')}}</b></h5>
                        <p class="">{{__('landing.lorem')}}</p>
                        <a href="#" class="btn btn-primary">{{__('landing.btn_explore')}}</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section id="initiatives" class="py-5 selectable-text-area">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('landing.initiatives.title')}}</h1>
                </div>
                <div class="col-auto ms-lg-auto ms-md-auto ms-sm-0 ms-0">
                    <a href="{{route('landing.initiatives')}}" class="btn btn-primary">{{__('landing.btn_view')}}</a>
                </div>
            </div>
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
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
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
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
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
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
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
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="news" class="py-5 selectable-text-area">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('landing.news.title')}}</h1>
                </div>
                <div class="col-auto ms-lg-auto ms-md-auto ms-sm-0 ms-0">
                    <a href="{{route('landing.news')}}" class="btn btn-primary">{{__('landing.btn_view')}}</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
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
                            <p class="card-text mb-2">{{__('landing.news.lorem_activity')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
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
                            <p class="card-text mb-2">{{__('landing.news.lorem_activity')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
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
                            <p class="card-text mb-2">{{__('landing.news.lorem_activity')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
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
                            <p class="card-text mb-2">{{__('landing.news.lorem_activity')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="open_calls" class="py-5 selectable-text-area">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('landing.open_calls.title')}}</h1>
                </div>
                <div class="col-auto ms-lg-auto ms-md-auto ms-sm-0 ms-0">
                    <a href="{{route('landing.open_calls')}}" class="btn btn-primary">{{__('landing.btn_view')}}</a>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
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
                            <p class="card-text mb-2">{{__('landing.open_calls.lorem_activity')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
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
                            <p class="card-text mb-2">{{__('landing.open_calls.lorem_activity')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
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
                            <p class="card-text mb-2">{{__('landing.open_calls.lorem_activity')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
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
                            <p class="card-text mb-2">{{__('landing.open_calls.lorem_activity')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="calendar" class="bg-white selectable-text-area">
        <div class="container p-4">
        <div class="row align-items-center">
            <div class="col-auto ms-auto be-gray">
                <h1 class="title-lg text-ocean">{{__('landing.calendar.title')}}</h1>
            </div>
            <div class="col-auto me-auto">
                <a href="{{route('landing.calendar')}}" class="btn btn-secondary">{{__('landing.btn_view')}}</a>
            </div>
        </div>
        </div>
        
    </section>
@endsection
<!-- resources/views/landing/home.blade.php -->

@extends('commons.base')

@section('content')
    <section id="map">
    <div>
        <div class="d-block">
            <div class="">
                <!-- el viewBox 450 cambia el tamaño de la vista del heigth de la imagen con los botones -->
                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" 
                viewBox="0 0 1056 450" style="enable-background:new 0 0 1056 816;" xml:space="preserve"
                style="position:absolute;vertical-align:middle">
                    <rect x="47" y="163" class="getData st0" id="21A" width="120" height="60" onclick="Depa21A(); resetDropdown(); plantaAlta();"/>
                    <rect x="35" y="38" class="getData st0" id="31A" width="132" height="125" onclick="Depa31A(); resetDropdown(); plantaAlta();"/>
                    
                    <rect x="171" y="163" class="getData st0" id="22A" width="115" height="60" onclick="Depa22A(); resetDropdown(); plantaAlta();"/>
                    <rect x="171" y="38" class="getData st0" id="32A" width="115" height="125" onclick="Depa32A(); resetDropdown(); plantaAlta();"/>
                    
                    <rect x="290" y="163" class="getData st0" id="23A" width="114" height="60" onclick="Depa23A(); resetDropdown(); plantaAlta();"/>
                    <rect x="290" y="38" class="getData st0" id="33A" width="114" height="125" onclick="Depa33A(); resetDropdown(); plantaAlta();"/>
                    
                    <rect x="408" y="163" class="getData st0" id="24A" width="114" height="60" onclick="Depa24A(); resetDropdown(); plantaAlta();"/>
                    <rect x="408" y="38" class="getData st0" id="34A" width="114" height="125" onclick="Depa34A(); resetDropdown(); plantaAlta();"/>

                    <rect x="526" y="163" class="getData st0" id="25A" width="114" height="60" onclick="Depa25A(); resetDropdown(); plantaAlta();"/>   
                    <rect x="526" y="38" class="getData st0" id="35A" width="114" height="125" onclick="Depa35A(); resetDropdown(); plantaAlta();"/>  
                    
                    <rect x="644" y="163" class="getData st0" id="26A" width="114" height="60" onclick="Depa26A(); resetDropdown(); plantaAlta();"/>   
                    <rect x="644" y="38" class="getData st0" id="36A" width="114" height="125" onclick="Depa36A(); resetDropdown(); plantaAlta();"/>    
                    
                    <rect x="762" y="163" class="getData st0" id="27A" width="114" height="60" onclick="Depa27A(); resetDropdown(); plantaAlta();"/>   
                    <rect x="762" y="38" class="getData st0" id="37A" width="114" height="125" onclick="Depa37A(); resetDropdown(); plantaAlta();"/> 

                    <rect x="880" y="163" class="getData st0" id="28A" width="123" height="60" onclick="Depa28A(); resetDropdown(); plantaAlta();"/>   
                    <rect x="880" y="38" class="getData st0" id="38A" width="123" height="125" onclick="Depa38A(); resetDropdown(); plantaAlta();"/>   
                    
                    
                    <text transform="matrix(1 0 0 1 75 205 )" class="getData st1 st2 st3">A-21</text> 
                    <text transform="matrix(1 0 0 1 70 124 )" class="getData st1 st2 st3">A-31</text>
                    <text transform="matrix(1 0 0 1 200 205)" class="getData st1 st2 st3">A-22</text>
                    <text transform="matrix(1 0 0 1 200 124)" class="getData st1 st2 st3">A-32</text>
                    <text transform="matrix(1 0 0 1 315 205)" class="getData st1 st2 st3">A-23</text>
                    <text transform="matrix(1 0 0 1 315 124)" class="getData st1 st2 st3">A-33</text>
                    <text transform="matrix(1 0 0 1 435 205)" class="getData st1 st2 st3">A-24</text>
                    <text transform="matrix(1 0 0 1 435 124)" class="getData st1 st2 st3">A-34</text>
                    <text transform="matrix(1 0 0 1 555 205)" class="getData st1 st2 st3">A-25</text>
                    <text transform="matrix(1 0 0 1 555 124)" class="getData st1 st2 st3">A-35</text>
                    <text transform="matrix(1 0 0 1 670 205)" class="getData st1 st2 st3">A-26</text>
                    <text transform="matrix(1 0 0 1 670 124)" class="getData st1 st2 st3">A-36</text>
                    <text transform="matrix(1 0 0 1 790 205)" class="getData st1 st2 st3">A-27</text>
                    <text transform="matrix(1 0 0 1 790 124)" class="getData st1 st2 st3">A-37</text>
                    <text transform="matrix(1 0 0 1 910 205)" class="getData st1 st2 st3">A-28</text>
                    <text transform="matrix(1 0 0 1 910 124)" class="getData st1 st2 st3">A-38</text>                    
                </svg>
    
                <img style="width: auto; height: auto; max-width: 100%;vertical-align:middle" src="{{asset('assets/img/map.png')}}">

            </div>
        </div>
    </div>
    </section>

    <section id="about" class="container p-5">
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

    <section id="num_stats">
        <div class="banner-title ">
            <div class="banner-img-overlay">
                <h1 class="title-lg text-yellow2">{{__('landing.stats.title')}}</h1>
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
    <section id="news" class="py-5">
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
                            <h6 class="date mb-2">13 Jul, 2023</h6>
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h6 class="date mb-2">13 Jul, 2023</h6>
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h6 class="date mb-2">13 Jul, 2023</h6>
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/news.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h6 class="date mb-2">13 Jul, 2023</h6>
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="open_calls" class="py-5">
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
                            <h6 class="date mb-2">Deadline: 31 December 2023</h6>
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h6 class="date mb-2">Deadline: 31 December 2023</h6>
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h6 class="date mb-2">Deadline: 31 December 2023</h6>
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <img src="{{asset('assets/img/Home/open_calls.png')}}" class="card-img-top" alt="...">
                        <div class="card-body px-0 bg-black text-white">
                            <h6 class="date mb-2">Deadline: 31 December 2023</h6>
                            <h5 class="card-title mb-2">{{__('landing.lorem_title')}}</h5>
                            <p class="card-text mb-2">{{__('landing.lorem')}}</p>
                            <a href="#" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="calendar" class="bg-white">
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
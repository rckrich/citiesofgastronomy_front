<!-- resources/views/landing/about.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_about">

        <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="0" class="mx-2 active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="1" class="mx-2" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="2" class="mx-2" aria-label="Slide 3"></button>
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('about.title')}}</h1>
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

        <div class="container p-5">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <p>{{__('landing.lorem')}}</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                <img src="{{asset('assets/img/Home/sample.png')}}" class="mx-auto my-auto w-100 br-9" alt="...">
            </div>

        </div>
        </div>

        <div class="bg-dark-gray">
            <div class="container p-5 bg-dark-gray">
                <div class="min-h-80 row px-0 mx-0 align-items-center">
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
                                <a target="_blank" href="https://en.unesco.org/creative-cities/" class="btn btn-primary">{{__('landing.btn_explore')}}</a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container p-5">
            <div class="row align-items-center mb-5 pt-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('about.faq.title')}}</h1>
                </div>
            </div>
            <div class="row">

                <div class="col-12">

                    <div class="accordion" id="accordionFAQ">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            {{__('about.lorem')}}
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                        </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            {{__('about.lorem')}}
                        </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                        </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            {{__('about.lorem')}}
                        </div>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container p-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('about.timeline.title')}}</h1>
                </div>
            </div>
            <div class="row align-items-center">
                <div id="timeline-list" class="px-0">
                    <div class="timeline-item row align-items-center mx-auto my-3">
                        <div class="timeline-col px-0 mx-2 col-lg-7 col-md-7 col-sm-5 col-5 bl-blue ">
                            <div class="w-100 timeline-title ps-3 text-left">Title</div>
                        </div>
                        <div class="timeline-col px-0 mx-2 col-lg-1 col-md-1 col-sm-1 col-auto text-center">
                            <div class="w-100"><img class="mx-auto" src="{{asset('assets/icons/visibility.svg')}}" width="38"height="26"/></div>
                        </div>
                        <div class="timeline-col px-0 mx-2 col-lg-3 col-md-3 col-sm-3 col-auto text-center">
                            <div class="w-100 timeline-date">12. Jan.2024 - 14.Jan.2024</div>
                        </div>
                    </div>

                    <div class="timeline-item row align-items-center mx-auto my-3">
                        <div class="timeline-col px-0 mx-2 col-lg-7 col-md-7 col-sm-5 col-5 bl-blue ">
                            <div class="w-100 timeline-title ps-3 text-left">Title</div>
                        </div>
                        <div class="timeline-col px-0 mx-2 col-lg-1 col-md-1 col-sm-1 col-auto text-center">
                            <div class="w-100"><img class="mx-auto" src="{{asset('assets/icons/visibility_off.svg')}}" width="38"height="26"/></div>
                        </div>
                        <div class="timeline-col px-0 mx-2 col-lg-3 col-md-3 col-sm-3 col-auto text-center">
                            <div class="w-100 timeline-date">14.Dec.2023</div>
                        </div>
                    </div>

                    <div class="timeline-item row align-items-center mx-auto my-3">
                        <div class="timeline-col px-0 mx-2 col-lg-7 col-md-7 col-sm-5 col-5 bl-blue ">
                            <div class="w-100 timeline-title ps-3 text-left">Title</div>
                        </div>
                        <div class="timeline-col px-0 mx-2 col-lg-1 col-md-1 col-sm-1 col-auto text-center">
                            <div class="w-100"><img class="mx-auto" src="{{asset('assets/icons/visibility.svg')}}" width="38"height="26"/></div>
                        </div>
                        <div class="timeline-col px-0 mx-2 col-lg-3 col-md-3 col-sm-3 col-auto text-center">
                            <div class="w-100 timeline-date">14.Nov.2023</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>




    </section>
@endsection

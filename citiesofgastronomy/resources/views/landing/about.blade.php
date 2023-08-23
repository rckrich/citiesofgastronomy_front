<!-- resources/views/landing/about.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_about">
        <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('about.title')}}</h1>
                </div>
            </div>
        </div>


        <div class="container p-5">
        <div class="my-5 row px-0 mx-0 align-items-start">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <p>{{__('landing.lorem')}}</p>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5">
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
                                <a href="#" class="btn btn-primary">{{__('landing.btn_explore')}}</a>
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
                    <h1 class="title-xl">{{__('about.faq.title')}}</h1>
                </div>
            </div>
            <div class="row">
                
                <div class="col-12">
                    
                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                            </button>
                        </h2>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            {{__('about.lorem')}}
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                            </button>
                        </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            {{__('about.lorem')}}
                        </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            {{__('about.faq.subtitle',['city'=>'City'])}}
                            </button>
                        </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
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
            <div class="row">
                
                <div class="col-12">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"></li>
                        <li class="list-group-item flex-fill">Title</li>
                        <li class="list-group-item ">A second item</li>
                        <li class="list-group-item flex-fill">14.Jan.2024</li>
                    </ul>
                </div>
               
            </div>
        </div>

     
        

    </section>
@endsection
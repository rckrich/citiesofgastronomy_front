<!-- resources/views/landing/contact.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_contact">

        <div id="contactCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#contactCarousel" data-bs-slide-to="0" class="mx-2 active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#contactCarousel" data-bs-slide-to="1" class="mx-2" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#contactCarousel" data-bs-slide-to="2" class="mx-2" aria-label="Slide 3"></button>
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-yellow">{{__('contact.title')}}</h1>
                </div>
            </div>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="4000">
                    <img src="{{asset('assets/img/Banners/IMG_Contact.png')}}"/>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{asset('assets/img/Banners/IMG_Contact.png')}}"/>
                </div>
                <div class="carousel-item" data-bs-interval="4000">
                    <img src="{{asset('assets/img/Banners/IMG_Contact.png')}}"/>
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div id="contact-cards" class="row g-6 py-5 col-12 mx-auto">
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>             
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-group col-lg-2 col-md-3 col-sm-6 col-12 my-3">
                    <div class="card h-100">
                        <div class="card-body px-0 text-center">
                            <h5 class="card-title mt-2 mb-4">{{__('contact.title_sample')}}</h5>
                            <div class="mb-2">
                                <p class="card-text mb-2">{{__('contact.text_sample')}}</p>
                                <p class="card-text mb-2">{{__('contact.text_sample2')}}</p>
                                <div class="row align-items-end ">
                                <div class="col-auto mx-auto my-4">
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                                    <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>



    </section>
@endsection
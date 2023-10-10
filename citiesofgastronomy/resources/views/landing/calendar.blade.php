<!-- resources/views/landing/calendar.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_calendar">
        <div class="banner-title mb-5">
        <div class="banner-title-overlay row align-items-center mx-0">
            <div class="banner-img-overlay">
                <h1 class="title-lg text-yellow">{{__('calendar.title')}}</h1>
            </div>
        </div>
        </div>

        <div class="container p-5">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('calendar.timeline.title')}}</h1>
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
                        <div class="timeline-col px-0 mx-2 col-lg-7 col-md-7 col-sm-5 col-5 bl-orange ">
                            <div class="w-100 timeline-title ps-3 text-left">Title</div>
                        </div>
                        <div class="timeline-col px-0 mx-2 col-lg-1 col-md-1 col-sm-1 col-auto text-center">
                            <div class="w-100"><img class="mx-auto" src="{{asset('assets/icons/visibility.svg')}}" width="38"height="26"/></div>
                        </div>
                        <div class="timeline-col px-0 mx-2 col-lg-3 col-md-3 col-sm-3 col-auto text-center">
                            <div class="w-100 timeline-date">14.Dec.2023</div>
                        </div>
                    </div>

                    <div class="timeline-item row align-items-center mx-auto my-3">
                        <div class="timeline-col px-0 mx-2 col-lg-7 col-md-7 col-sm-5 col-5 bl-yellow ">
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
<!-- resources/views/landing/calendar.blade.php -->

@extends('commons.base')

@section('content')
    <section id="page_calendar">
        <div id="calendarCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
            <div class="carousel-indicators">
            <?php $i=0?>
                @foreach($banners as $banner)
                    <button type="button" data-bs-target="#calendarCarousel" data-bs-slide-to="<?= $i?>" class="mx-2<?php
                    if($i == 0){echo ' active" aria-current="true';}?>" aria-label="Slide <?= $i?>"></button>
                    <?php $i = $i+1;?>
                @endforeach
            </div>
            <div class="banner-title">
            <div class="banner-title-overlay row align-items-center mx-0">
                <div class="banner-img-overlay">
                    <h1 class="title-lg text-white">{{__('calendar.title')}}</h1>
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

        @include('commons.work_in_progress')

        <!--div class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row align-items-center mb-lg-2 mb-md-3 mb-sm-3 mb-3">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <h1 class="title-xl">{{__('calendar.timeline.title')}}</h1>
                </div>
            </div>
            <div class="row align-items-center">

            <div class="table-responsive px-0">
                <table id="timeline-list" class="table table-dark w-100">
                    <tbody>

                    @foreach($timeline as $time)

                        <tr class="timeline-item">
                            <td class="timeline-col timeline-title text-left ps-3 mx-2
                                {{ $time['month'] == 1 || $time['month'] == 7 ? 'bl-1':''}}
                                {{ $time['month'] == 2 || $time['month'] == 8 ? 'bl-2':''}}
                                {{ $time['month'] == 3 || $time['month'] == 9 ? 'bl-3':''}}
                                {{ $time['month'] == 4 || $time['month'] == 10 ? 'bl-4':''}}
                                {{ $time['month'] == 5 || $time['month'] == 11 ? 'bl-5':''}}
                                {{ $time['month'] == 6 || $time['month'] == 12 ? 'bl-6':''}} ">
                                <?= $time["name"]?>
                            </td>
                            <td class="timeline-col timeline-icon text-center">
                                <a href="{{route('initiatives.view',['id'=>$time['id']])}}" target="_blank">
                                    <img class="mx-auto visible-icon" src="{{asset('assets/icons/visibility.svg')}}"/>
                                </a>
                            </td>
                            <td class="timeline-col timeline-date text-center"><?= $time["startDate"]?> <?php
                                if($time["endDate"]){echo ' - '.$time["endDate"];};//14.Jan.2024?>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>


            </div>

        </div-->

    </section>
@endsection

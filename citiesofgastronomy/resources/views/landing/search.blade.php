<!-- resources/views/landing/search.blade.php -->

@extends('commons.base')

@section('content')
    <section id="search_results">
        <div class="container pt-5 pb-3 px-lg-5 px-md-5 px-sm-3 p-3">
            <p class="data text-orange mb-0">{{__('landing.search.title')}}<b>{{$search_box}}</b></p>
        </div>
        <div class="container pt-lg-3 p-lg-5 pt-md-3 p-md-5 p-sm-3 p-3">
            <div class="row g-4">

            @foreach($results as $item )                 

                <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="card">
                        <a href="<?php
                            if($item['type'] == 'Initiatives'){echo route('initiatives.view',['id'=>$item['id']]);}
                            if($item['type'] == 'Recipes'){echo route('tastier_life.view',['id'=>$item['id']]);}
                            if($item['type'] == 'Tours'){echo route('tours.view',['id'=>$item['id']]);}
                        ?>" class="img-link">
                            @if($item['photo'] !=null || $item['photo'] != '')
                            <img src="{{config('app.url').$item['photo']}}" class="card-img-top" alt="...">
                            @else
                            <img src="{{asset('assets/img/Home/sample.png')}}" class="card-img-top" alt="...">
                            @endif
                        </a> 
                        <div class="card-body px-0 bg-black text-white">
                            <h5 class="card-title mb-2">{{$item['name']}}</h5>
                            <p class="card-text mb-2">{{
                                str_replace(['<br />','&nbsp;'], ' ', 
                                    nl2br(htmlspecialchars_decode(html_entity_decode(strip_tags($item["description"]))))
                                )
                            }}</p>
                            <a href="<?php
                                if($item['type'] == 'Initiatives'){echo route('initiatives.view',['id'=>$item['id']]);}
                                if($item['type'] == 'Recipes'){echo route('tastier_life.view',['id'=>$item['id']]);}
                                if($item['type'] == 'Tours'){echo route('tours.view',['id'=>$item['id']]);}
                            ?>" class="btn btn-link px-0">{{__('landing.btn_read')}}</a>
                            
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
@endsection
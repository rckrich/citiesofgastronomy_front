<!-- resources/views/tastier_life/show.blade.php -->

@extends('commons.base')

@section('content')
<section id="show_tastierlife">
    <div class="container p-lg-5 p-md-5 pb-md-3 p-sm-3 p-3">
        <div class="my-5 row px-0 mx-0 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title-sm mb-4">{{$name}}</h5>
                <h6 class="data-sm py-2">{!! $description !!}</h6>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('tastier_life.data_city')}}</b>{{$cityName}}</h6>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('tastier_life.data_cat')}}</b>{{$categoryName}}</h6>
                <h6 class="data-sm py-2"><b class="text-orange">{{__('tastier_life.data_chef')}}</b>{{$chefName}}</h6>
                <div class="row align-items-start">
                    <div class="col-auto">
                        @foreach($socialMedia as $s)
                        <a href="{{$s['value']}}" target="_blank" class="px-2"><img class="icon-social" src="{{asset('assets/icons/'.$s['icon'])}}" height="25" width="25"/></a>
                        @endforeach
                        <!--a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="19" width="23"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                        <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/tiktok.svg')}}" height="19" width="23"/></a-->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-12 mt-lg-0 mt-md-0 mt-sm-5 mt-5">
                <img src="{{config('app.url').$photo}}" class="mx-auto my-auto w-100 br-9" alt="...">
            </div>
        </div>
    </div>

    <div class="container p-lg-5 p-md-5 py-md-3 p-sm-3 p-3">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-12 p-xl-5 pt-xl-4 p-lg-4 p-md-4 pt-md-3 p-sm-3 p-3">
                <div class="p-lg-4 p-md-4 p-sm-3 p-3 title-xs bg-orange text-white text-center">
                    <b>{{__('tastier_life.about_title')}}</b>
                </div>
                <div class="bg-gray text-left row px-3 py-5 mx-0">
                    <div class="row pt-2 px-0 mx-0 align-items-start">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2 text-right pe-2">
                            <img class="recipe-icon" src="{{asset('assets/icons/Icon_Difficulty.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10 ps-0">
                            <p class="mb-1 text-orange subtitle"><b>{{__('tastier_life.data_difficulty')}}</b></p>                    
                            <p class="pb-2 mb-1 text-white data">{{$difficulty}}</p>
                        </div>
                    </div>                    
                    <div class="row pt-2 px-0 mx-0 align-items-start">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2 text-right pe-2">
                            <img class="recipe-icon" src="{{asset('assets/icons/Icon_PrepTime.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10 ps-0">
                            <p class="mb-1 text-orange subtitle"><b>{{__('tastier_life.data_preptime')}}</b></p>
                            <p class="pb-2 mb-1 text-white data">{{$prepTime}}</p>
                        </div>
                    </div>                  
                    <div class="row pt-2 px-0 mx-0 align-items-start">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2 text-right pe-2">
                            <img class="recipe-icon" src="{{asset('assets/icons/Icon_TotalTime.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10 ps-0">
                            <p class="mb-1 text-orange subtitle"><b>{{__('tastier_life.data_totaltime')}}</b></p>
                            <p class="pb-2 mb-1 text-white data">{{$totalTime}}</p>
                        </div>
                    </div>                    
                    <div class="row pt-2 px-0 mx-0 align-items-start">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2 text-right pe-2">
                            <img class="recipe-icon" src="{{asset('assets/icons/Icon_Servings.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10 ps-0">
                            <p class="mb-1 text-orange subtitle"><b>{{__('tastier_life.data_servings')}}</b></p>
                            <p class="pb-2 mb-1 text-white data">{{$servings}}</p>
                        </div>
                    </div>                    
                    <div class="row pt-2 px-0 mx-0 align-items-start">
                        <div class="col-lg-3 col-md-3 col-sm-2 col-2 text-right pe-2">
                            <img class="recipe-icon" src="{{asset('assets/icons/Icon_Ingredients.png')}}"/>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-10 col-10 ps-0">        
                            <p class="mb-1 text-orange subtitle"><b>{{__('tastier_life.data_ingredients')}}</b></p>
                            <p class="pb-2 mb-1 text-white data">{!! $ingredients !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 col-12 p-lg-4 p-md-3 p-sm-3 p-3">
                <p class="py-2 data ">{!! $preparations !!}</p>
                <div class="row px-0">
                    <div class="col-lg-3 col-md-3 col-4 mx-auto ms-0 my-auto">
                        <button id="votes-btn" class="btn btn-primary w-100" onclick="vote({{$id}})">
                        <img src="{{asset('assets/icons/heart.png')}}" width="25" height="auto"/>
                        {{__('admin.btn_vote')}}</button>
                    </div>
                    <div class="col-lg-3 col-md-3 col-4 mx-auto me-0 my-auto text-right">
                        <h4 class="w-100" id="votes_counter">{{$votes}} {{trans_choice('tastier_life.data_votes',['num' => $votes])}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container p-lg-5 p-md-5 py-md-3 p-sm-3 p-3">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                <h1 class="title-xl">{{__('general.gallery')}}</h1>
            </div>
        </div>
        <div class="row align-items-center mb-5">
            @if($gallery)
            <div class="row mx-0 p-0 max-height-gallery" data-lightbox="gallery">
                @foreach($gallery as $img)
                <div class="col-lg-3 col-md-6 col-sm-6 col-6 p-2">
                    <a class="grid-item" href="{{config('app.url').$img['image']}}" data-lightbox="gallery-item" >
                        <img src="{{config('app.url').$img['image']}}" alt="Gallery Image" class="gallery-img" />
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <p class="">{{__('general.no_gallery')}}</p>
            @endif
            </div>
        </div>
        
        <div class="w-100 bb-orange py-5"></div>

    </div>

    <div class="container p-lg-5 p-md-5 p-sm-3 p-3 row align-items-center mx-auto">
        <div class="row align-items-center data-sm text-orange pb-5">
            <b class="col-auto pe-5">{{__('general.share')}}</b>
            <div class="col-auto px-2 fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="" data-size="">
                <a class="" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{route('tastier_life.view',['id'=>$id])}}">
                    <img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/>
                </a>
            </div>       
            <!--a class="col-auto px-2"  onclick="shareLinkedIn(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="25" width="25"/></a-->
            <a class="col-auto px-2" href="" onclick="shareTwitter(window.location.href)"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
        </div>
    </div>



</section>

<script>

    var totalVotes = {{$votes}}
    var data_id = {{$id}}

    $(document).ready(function(e){
        if (hasVotedBefore(data_id)) {
            document.getElementById("votes-btn").disabled = true;

        } else {
            document.getElementById("votes-btn").disabled = false;
        }
    });

    function vote(data_id){
        if(data_id){
            $.ajax({
                type: 'GET',
                url: '/admin/tastier_life/recipe/vote/'+data_id,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){},
                success: function(msg){                  
                    if (msg.status===400) {
                        alert("Error: " + msg.message);
                    } 
                    else {
                        updateVotes(totalVotes+1);
                    }
                }
            });
        }
    }

    function updateVotes(newCount){
        let counterKey = 'voteCounter_' + data_id;
        localStorage.setItem(counterKey,newCount);
        let updatedText = "{{trans_choice('tastier_life.data_votes',['num' => $votes+1])}}";
        document.getElementById('votes_counter').innerHTML = newCount + ' ' + updatedText;
    }

    function hasVotedBefore(itemId) {
        return localStorage.getItem('voteCounter_' + data_id) !== null;
    }
</script>
@endsection
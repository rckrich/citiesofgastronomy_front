<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>CitiesOfGastronomy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" >
    <link rel="stylesheet" href="{{asset('css/canvas_carousels.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/canvas_style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/business.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top py-4">
        <div class="row mx-0 col-lg-2 col-md-4 col-sm-4 col-4 ms-lg-auto ms-md-0 ms-sm-0 ms-0 ps-lg-5 ps-md-5 ps-sm-3 ps-3">
            <a class="navbar-brand m-auto" href="{{ route('landing.index') }}">
                <img id="navbarLogo" class="" src="{{asset('assets/img/logo.png')}}" alt="Logo"/>
            </a>
        </div>
        <div class="pe-lg-5 pe-md-5 pe-sm-3 pe-3">
        <button id="OpenMenu" class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li id="nav_index" class="nav-item {{ request()->routeIs('landing.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.index')}}">{{__('general.nav_index')}}</a>
                </li>
                <li id="nav_cities" class="nav-item {{ request()->routeIs('landing.cities') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.cities')}}">{{__('general.nav_cities')}}</a>
                </li>
                <li id="nav_about" class="nav-item {{ request()->routeIs('landing.about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.about')}}">{{__('general.nav_about')}}</a>
                </li>
                <li id="nav_initiatives" class="nav-item {{ request()->routeIs('landing.initiatives') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.initiatives')}}">{{__('general.nav_initiatives')}}</a>
                </li>
                <li id="nav_initiatives" class="nav-item {{ request()->routeIs('landing.tastier_life') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.tastier_life')}}">{{__('general.nav_tastier_life')}}</a>
                </li>
                <li id="nav_tours" class="nav-item {{ request()->routeIs('landing.tours') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.tours')}}">{{__('general.nav_tours')}}</a>
                </li>
                <li id="nav_stats" class="nav-item {{ request()->routeIs('landing.stats') ? 'active' : '' }}">
                    <a class="nav-link" target="_blank" href="https://drive.google.com/drive/folders/1b2TV7H4y8SwQZaSuAyAQ_AMn9ovczgIs?usp=drive_link">{{__('general.nav_stats')}}</a>
                </li>
                <li id="nav_calendar" class="nav-item {{ request()->routeIs('landing.calendar') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.calendar')}}">{{__('general.nav_calendar')}}</a>
                </li>
                <li id="nav_contact" class="nav-item {{ request()->routeIs('landing.contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.contact')}}">{{__('general.nav_contact')}}</a>
                </li>
            </ul>
            <!--
                <form id="searchForm" class="d-flex" role="search" action="{{route('search')}}" method="post">
                    @csrf
                    @method('POST')
                    <div class="input-group px-2">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" type="search" aria-label="{{__('general.search')}}" aria-describedby="basic-addon1">
                    </div>
                </form>
            -->

        </div>

    </nav>
    <div class="navbar-height-margin">
        @yield('content')
        <!--div id="share-btns" class="">
            <button id="linkedin-share-btn" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></button>
            <button id="facebook-share-btn" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></button>
            <button id="twitter-share-btn" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></button>
        </div-->
        <button id="twitter-share-btn"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></button>
    </div>
    <section id="newsletter">
        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row">
                <div class="col-lg-6 col-md-5 col-sm-12 col-12">
                    <img  id="footerLogo" class="mb-5" src="{{asset('assets/img/logo_white.png')}}" alt="Logo"/>
                    <!--<form>-->
                        @csrf
                        <div class="row g-2 mb-3">
                            <label for="newsletter_email">{{__('general.newsletter.description')}}</label>
                            <div class="col-auto">
                                <input type="text" id="newsletter_email" class="form-control" placeholder="{{__('general.newsletter.placeholder')}}"/>
                                <div id="validation_emailNews" class="invalid-feedback" style="padding: 5px 10px; background-color:#FFF;
                                display: none;">Please insert a valid email</div>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-primary" id="newsletterBTN"
                                            onclick="newsletterSave()">{{__('general.btn_subscribe')}}</button>
                            </div>
                        </div>
                    <!--</form>-->
                </div>
                <div class="col-lg-6 col-md-7 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-lg-0 my-md-0 my-sm-3 my-3">
                            <p class="title-xs">{{__('general.newsletter.info')}}</p>
                            <a class="nav-link py-1" href="{{route('landing.index')}}">{{__('general.nav_index')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.cities')}}">{{__('general.nav_cities')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.about')}}">{{__('general.nav_about')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.initiatives')}}">{{__('general.nav_initiatives')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.tastier_life')}}">{{__('general.nav_tastier_life')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.tours')}}">{{__('general.nav_tours')}}</a>
                            <a class="nav-link py-1" target="_blank" href="https://drive.google.com/drive/folders/1b2TV7H4y8SwQZaSuAyAQ_AMn9ovczgIs?usp=drive_link">{{__('general.nav_stats')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.calendar')}}">{{__('general.nav_calendar')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.contact')}}">{{__('general.nav_contact')}}</a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-lg-0 my-md-0 my-sm-3 my-3">
                            <p class="title-xs">{{__('general.newsletter.cluster')}}</p>
                            @for($i=0; $i < count($info); $i++)
                            @if($i == 0)
                                <p class="py-1 mb-1">{{__('general.coord_name')}}<br/>{{$info[$i]["value"]}}</p>
                            @elseif($i == 1)
                                <p class="py-1 mb-1">{{__('general.coord_email')}}<br/>{{$info[$i]["value"]}}</p>
                            @elseif($i == 2)
                                <a class="nav-link py-1" href="{{$info[$i]['value']}}" target="_blank">{{__('general.coord_link')}}</a>
                            @else()
                                <a class="nav-link py-1">{{$info[$i]["value"]}}</a>
                            @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 align-self-start">
                    <div class="row g-2">
                        <p>{{__('general.copyright')}}</p>
                        <div class="col-auto">
                            <a href="{{route('landing.privacy_policy')}}" target="_blank">{{__('general.privacy_policy')}}</a>
                        </div>
                        <div class="col-auto offset-3">
                            <a href="{{route('landing.terms_conditions')}}" target="_blank">{{__('general.terms_of_use')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 align-self-end">
                    <div class="row align-items-end">
                        <div class="col-auto me-lg-0 me-md-0 me-sm-auto mx-auto my-lg-0 my-md-0 my-sm-4 my-4">
                            @for($i=0; $i < count($SocialNetworkType); $i++)
                            @if($SocialNetworkType[$i]['value']!=NULL && $SocialNetworkType[$i]['value']!='')
                            <a href="<?= $SocialNetworkType[$i]['value']?>" target="blank" class="px-2"><img class="icon-social" src="{{asset('assets/icons/'. $SocialNetworkType[$i]['icon'])}}" height="23" width="23"/></a>
                            @endif
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="{{asset('js/plugins.min.js')}}"></script>
    <script>
		jQuery(window).on( 'pluginCarouselReady', function(){
			$('#oc-features').owlCarousel({
				items: 1,
				margin: 60,
			    nav: true,
			    navText: ['<i class="icon-line-arrow-left"></i>','<i class="icon-line-arrow-right"></i>'],
			    dots: false,
			    stagePadding: 30,
			    responsive:{
					768: { items: 2 },
					1200: { stagePadding: 200 }
				},
			});
		});
	</script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0" nonce="d655f07n"></script>

    <script>
        function newsletterSave(){
            console.log("-->newlwtter");
            document.getElementById("validation_emailNews").style.display = "none";
            document.getElementById("newsletterBTN").disabled = true;
            let newsletter_email = document.getElementById("newsletter_email").value;
            let token = document.getElementsByName("_token")[0].value;

            let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

            if (emailRegex.test(newsletter_email)) {
                //alert(" email válido");
                    let datos = new FormData();
                    datos.append('_token', token);
                     datos.append('newsletter', newsletter_email);

                $.ajax({
                        type: 'POST',
                        url: '/newslettersave',
                        data: datos,
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){
                            $('.submitBtn').attr("disabled","disabled");
                        },
                        success: function(msg){
                            //window.location ='/admin/cities/';
                            alert("Thanks for subscribing");
                            document.getElementById("newsletterBTN").disabled = false;
                        }
                    });
                    //*/
            } else {
                incorrectEmail= 'si';//alert("Please insert a valid email");//*/
                document.getElementById("validation_emailNews").style.display = "block";
                document.getElementById("newsletterBTN").disabled = false;
            };

                    //*/
        }
    </script>
</body>
</html>

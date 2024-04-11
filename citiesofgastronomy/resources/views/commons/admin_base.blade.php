<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>CitiesOfGastronomy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" >
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" type="text/css" >
    <link rel="stylesheet" href="{{asset('css/canvas_carousels.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/canvas_style.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/business.css')}}" type="text/css" />
	<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}" type="text/css" />

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <style>
        .inputImage{
            cursor: pointer;
            margin: 0;
            opacity: 0;
            outline: 0 none;
            padding: 0;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            height: 80px;
        }
        .submitImage{
            background-repeat: no-repeat;
            background-position: center center;
            width: 49px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top py-4">
        <div class="row mx-0 col-lg-2 col-md-4 col-sm-4 col-4 ms-lg-auto ms-md-0 ms-sm-0 ms-0 ps-5">
            <a class="navbar-brand m-auto" href="{{ route('landing.index') }}">
                <img id="navbarLogo" class="" src="{{asset('assets/img/logo.png')}}" alt="Logo"/>
            </a>
        </div>
        <div class="pe-5">
        <button id="OpenMenu" class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
        <div class="collapse navbar-collapse justify-content-start" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li id="nav_cities" class="nav-item {{ request()->routeIs('admin.cities') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.cities')}}">{{__('admin.nav_cities')}}</a>
                </li>
                <li id="nav_initiatives" class="nav-item {{ request()->routeIs('admin.initiatives') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.initiatives.in')}}">{{__('admin.nav_initiatives')}}</a>
                </li>
                <li id="nav_initiatives" class="nav-item {{ request()->routeIs('admin.tastier_life') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.tastier_life.recipes')}}">{{__('admin.nav_tastier_life')}}</a>
                </li>
                <li id="nav_tours" class="nav-item {{ request()->routeIs('admin.tours') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.tours')}}">{{__('admin.nav_tours')}}</a>
                </li>
                <li id="nav_about" class="nav-item {{ request()->routeIs('admin.about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.about')}}">{{__('admin.nav_about')}}</a>
                </li>
                <li id="nav_contact" class="nav-item {{ request()->routeIs('admin.contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.contact')}}">{{__('admin.nav_contact')}}</a>
                </li>
                <li id="nav_contact" class="nav-item {{ request()->routeIs('admin.main') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.main')}}">{{__('admin.nav_main')}}</a>
                </li>
                <li id="nav_contact" class="nav-item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.users')}}">{{__('admin.nav_users')}}</a>
                </li>
                <li id="nav_contact" class="nav-item {{ request()->routeIs('admin.newsletter') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('admin.newsletter')}}">{{__('admin.nav_newsletter')}}</a>
                </li>
            </ul>
            <div class="dropdown show mx-auto ms-lg-0 text-center">
                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    RCKgames
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li>
                        <form action ="{{route('admin.show_change_password')}}" method="POST" id="changePasswordForm">
                            @csrf         
                            <input id="access_token" name="access_token" type="hidden" value="1234"/>               
                            <button type="submit" id="changePasswordBtn" class="dropdown-item">{{__('session.change_password')}}</button></li>
                        </form>
                    <li><a class="dropdown-item" href="{{route('admin.logout')}}">{{__('session.logout')}}</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="navbar-height-margin min-h-100">
        @yield('content')
        <!--div id="share-btns" class="">
            <button id="linkedin-share-btn" class="px-2"><img class="icon-social" src="{{asset('assets/icons/linked_in.svg')}}" height="21" width="21"/></button>
            <button id="facebook-share-btn" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></button>
            <button id="twitter-share-btn" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></button>
        </div-->
        <button id="twitter-share-btn"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></button>
    </div>
    <footer>
        <div class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row">
                <div class="col-12 align-self-center text-center">
                    <div class="row g-2">
                        <p>{{__('general.copyright')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/functions.js')}}"></script>
    <script src="{{asset('js/plugins.min.js')}}"></script>
    <script>
        $("#dropdownMenuLink").on("click", function(){
            $("#dropdownMenuLink").dropdown("toggle");
        })
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

        /*$("#changePasswordForm").on('submit', function(e){
            e.preventDefault();
            document.getElementById("changePasswordBtn").disabled = true;

            let token = '1234';
            let form_token = document.getElementsByName("_token")[0].value;

            let datos = new FormData(this);    
            datos.append('_token', form_token);
            datos.append('access_token', token);
            document.getElementById("changePasswordBtn").disabled = false;
            $.ajax({
                type: 'POST',
                url: '../account/change_password',
                data: datos,
                contentType: false,
                cache: false,
                processData:false,
                success: function(msg){                    
                if (msg.status===400) {
                    alert("Error: " + msg.message);
                } 
                else {
                    alert('{{trans('session.password_set_success')}}');
                    window.location = '/account/change_password';
                }
            }
            });
        });*/

        /*
            $("#changePasswordForm").on('submit', function(e){
            e.preventDefault();
            let form =  document.getElementById("changePasswordForm");
            document.getElementById("changePasswordBtn").disabled = true;

            let token = '1234';
            let form_token = document.getElementsByName("_token")[0].value;

            let datos = new FormData(this);    
            datos.append('_token', form_token);
            datos.append('access_token', token);
            $("#changePasswordForm").submit();
        });*/

	</script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v18.0" nonce="d655f07n"></script>

    <script>

    function sel_file(destiny, origin, table, displ){
        let Element = document.getElementById(origin);
        let img = document.getElementById(destiny);
        let url = URL.createObjectURL(Element.files[0]);
            img.src = url;
        if(table){
            document.getElementById(table).style.display = displ;
        };
    }

    function deletefuncion(id, tabledel, inputDel){
        let id1 = tabledel+id ;
        document.getElementById(id1).style.display = 'none';
        id1 = inputDel+id ;
        document.getElementById(id1).value = '1' ;
    }

    function isValidUrl(string) {
        console.log(string);
            try {     new URL(string);       return true;
            } catch (err) { return false;        }
        }
    </script>
</body>
</html>

<!-- resources/views/layouts/sessions_base.blade.php -->

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
    <div class="">
        @yield('content')
    </div>
    <!--script src="{{asset('js/app.js')}}"></script--> 
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
</body>
</html>

<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>CitiesOfGastronomy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" >

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>    
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top px-5 py-4">
        <div class="row mx-0 col-lg-2 col-md-4 col-sm-4 col-4 ms-lg-auto ms-md-0 ms-sm-0 ms-0">
            <a class="navbar-brand m-auto" href="{{ route('landing.index') }}">
                <img id="navbarLogo" class="" src="{{asset('assets/img/logo.png')}}" alt="Logo"/>
            </a>
        </div>
        <button id="OpenMenu" class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li id="nav_index" class="nav-item {{ request()->routeIs('landing.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.index')}}">{{__('general.nav_index')}}</a>
                </li>
                <li id="nav_cities" class="nav-item {{ request()->routeIs('landing.cities') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.cities')}}">{{__('general.nav_cities')}}</a>
                </li>
                <li id="nav_about" class="nav-item {{ request()->routeIs('landing.about') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.about')}}">{{__('general.nav_about')}}</a>
                </li>
                <li id="nav_news" class="nav-item {{ request()->routeIs('landing.news') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.news')}}">{{__('general.nav_news')}}</a>
                </li>
                <li id="nav_events" class="nav-item {{ request()->routeIs('landing.events') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.events')}}">{{__('general.nav_events')}}</a>
                </li>
                <li id="nav_open_calls" class="nav-item {{ request()->routeIs('landing.open_calls') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.open_calls')}}">{{__('general.nav_opencalls')}}</a>
                </li>
                <li id="nav_projects" class="nav-item {{ request()->routeIs('landing.projects') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.projects')}}">{{__('general.nav_projects')}}</a>
                </li>
                <li id="nav_stats" class="nav-item {{ request()->routeIs('landing.stats') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.stats')}}">{{__('general.nav_stats')}}</a>
                </li>
                <li id="nav_calendar" class="nav-item {{ request()->routeIs('landing.calendar') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.calendar')}}">{{__('general.nav_calendar')}}</a>
                </li>
                <li id="nav_contact" class="nav-item {{ request()->routeIs('landing.contact') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('landing.contact')}}">{{__('general.nav_contact')}}</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="">
        @yield('content')
    </div>
    <section id="newsletter">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <img  id="navbarLogo" class="mb-5" src="{{asset('assets/img/logo_white.png')}}" alt="Logo"/>
                    <form>
                        <div class="row g-2 mb-3">                  
                            <label for="newsletter_email">{{__('general.newsletter.description')}}</label>
                            <div class="col-auto">
                                <input type="text" id="newsletter_email" class="form-control" placeholder="{{__('general.newsletter.placeholder')}}"/>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-primary">{{__('general.btn_subscribe')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-lg-0 my-md-0 my-sm-3 my-3">
                            <p class="title-xs">{{__('general.newsletter.info')}}</p>
                            <a class="nav-link py-1" href="{{route('landing.index')}}">{{__('general.nav_index')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.cities')}}">{{__('general.nav_cities')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.about')}}">{{__('general.nav_about')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.news')}}">{{__('general.nav_news')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.events')}}">{{__('general.nav_events')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.open_calls')}}">{{__('general.nav_opencalls')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.projects')}}">{{__('general.nav_projects')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.stats')}}">{{__('general.nav_stats')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.calendar')}}">{{__('general.nav_calendar')}}</a>
                            <a class="nav-link py-1" href="{{route('landing.contact')}}">{{__('general.nav_contact')}}</a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-12 my-lg-0 my-md-0 my-sm-3 my-3">
                            <p class="title-xs">{{__('general.newsletter.cluster')}}</p>
                            <a class="nav-link py-1">{{__('general.newsletter.coordinator')}}</a>
                            <a class="nav-link py-1">{{__('general.newsletter.mail')}}</a>
                            <a class="nav-link py-1">{{__('general.newsletter.cities')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 align-self-start">
                    <div class="row g-2">                  
                        <p>{{__('general.copyright')}}</p>
                        <div class="col-auto">
                            <a href="">{{__('general.privacy_policy')}}</a>
                        </div>
                        <div class="col-auto offset-3">
                            <a href="">{{__('general.terms_of_use')}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12 align-self-end">
                    <div class="row align-items-end ">
                        <div class="col-auto  ms-lg-auto ms-md-auto ms-sm-0 ms-0 my-lg-0 my-md-0 my-sm-4 my-4">
                            <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/facebook.svg')}}" height="25" width="25"/></a>
                            <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/instagram.svg')}}" height="23" width="23"/></a>
                            <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/twitter.svg')}}" height="19" width="23"/></a>
                            <a href="" class="px-2"><img class="icon-social" src="{{asset('assets/icons/youtube.svg')}}" height="21" width="21"/></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('js/app.js')}}"></script> 
</body>
</html>

<!-- resources/views/session/login.blade.php -->

@extends('commons.sessions_base')

@section('content')
    <section id="login" class="bg-white min-h-100 row mx-0">
        <div class="p-lg-5 p-md-5 p-sm-3 p-3 align-self-center">
            <div class="container-sm card bg-dark p-lg-5 p-md-5 p-sm-3 p-3">
                <div class="p-lg-5 p-md-5 p-sm-3 p-3 col-10 mx-auto">
                    <div class="text-center">
                        <img  id="navbarLogo" class="mb-5" src="{{asset('assets/img/logo.png')}}" alt="Logo"/>
                    </div>
                    <form>
                        <div class="form-group py-2">
                            <label for="data_user" class="text-white text-left py-2">{{__('session.data_user')}}</label>                
                            <input id="data_user" type="text" class="w-100" placeholder="{{__('session.data_name')}}"/>
                        </div>
                        <div class="form-group py-2">
                            <label for="data_password" class="text-white text-left py-2">{{__('session.data_password')}}</label>                
                            <input id="data_password" type="password" class="w-100" placeholder="{{__('session.data_password')}}"/>
                        </div>
                        <div class="text-right text-white py-4">
                            <a class="text-orange-light nav-link-sm" href="{{route('admin.reset_password')}}"><b>{{__('session.forgot')}}</b></a>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary"  href="{{route('admin.index')}}">{{__('session.btn_sign')}}</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
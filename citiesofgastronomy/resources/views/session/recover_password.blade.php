<!-- resources/views/session/recover_password.blade.php -->

@extends('commons.sessions_base')

@section('content')
    <section id="login" class="bg-white min-h-100 row mx-0">
        <div class="p-lg-5 p-md-5 p-sm-3 p-3 align-self-center">
            <div class="container-sm card bg-dark p-lg-5 p-md-5 p-sm-3 p-3">
                <div class="p-lg-5 p-md-5 p-sm-3 p-3 col-10 mx-auto">
                    <div>
                        <h3 class="text-center subtitle-md text-orange-light py-2"><b>{{__('session.forgot')}}</b></h3>
                        <p class="text-left data text-white py-2">{{__('session.forgot_desc')}}</p>
                    </div>
                    <form>
                        <div class="form-group py-5">
                            <label for="data_user" class="text-white text-left py-2">{{__('session.data_email')}}</label>                
                            <input id="data_user" type="text" class="w-100" placeholder="{{__('session.data_email_sample')}}"/>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-primary inverted mx-3"  href="{{route('admin.login')}}">{{__('session.btn_cancel')}}</a>
                            <a class="btn btn-primary mx-3" href="{{route('admin.login')}}">{{__('session.btn_reset')}}</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </section>
@endsection
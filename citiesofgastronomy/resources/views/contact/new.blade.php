<!-- resources/views/contact/new.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_contact_new">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('contact.create.title')}}</b></h3>
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3">
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('contact.create.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control" placeholder="{{__('contact.create.ph_name')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_position">{{__('contact.create.data_position')}}</label>
                        <input id="data_position" name="data_position" class="form-control" placeholder="{{__('contact.create.ph_position')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_city">{{__('contact.create.data_city')}}</label>
                        <input id="data_city" name="data_city" class="form-control" placeholder="{{__('contact.create.ph_city')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="facebook_link">{{__('contact.create.data_facebook')}}</label>
                        <input id="facebook_link" name="facebook_link" class="form-control" placeholder="{{__('contact.create.ph_facebook')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="twitter_link">{{__('contact.create.data_twitter')}}</label>
                        <input id="twitter_link" name="twitter_link" class="form-control" placeholder="{{__('contact.create.ph_twitter')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="tiktok_link">{{__('contact.create.data_linkedin')}}</label>
                        <input id="tiktok_link" name="tiktok_link" class="form-control" placeholder="{{__('contact.create.ph_linkedin')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="instagram_link">{{__('contact.create.data_instagram')}}</label>
                        <input id="instagram_link" name="instagram_link" class="form-control" placeholder="{{__('contact.create.ph_instagram')}}"/>
                    </div>
                    <div class="row form-group py-5">
                        <div class="col-auto ms-auto"><a href="{{route('admin.contact')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button class="btn btn-primary w-100">{{__('admin.btn_create')}}</buttton></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
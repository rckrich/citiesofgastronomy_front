<!-- resources/views/tastier_life/edit_chef.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_chef_edit">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('tastier_life.chefs.edit.title')}}</b></h3>
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3">
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tastier_life.chefs.edit.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control" placeholder="{{__('tastier_life.chefs.edit.ph_name')}}"/>
                    </div>
                    <div class="col-12 px-0 my-2">
                        <p class="admin-subtitle"><b>{{__('tastier_life.chefs.edit.section_socials')}}</b></p>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="facebook_link">{{__('tastier_life.chefs.edit.data_facebook')}}</label>
                        <input id="facebook_link" name="facebook_link" class="form-control" placeholder="{{__('tastier_life.chefs.edit.ph_facebook')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="twitter_link">{{__('tastier_life.chefs.edit.data_twitter')}}</label>
                        <input id="twitter_link" name="twitter_link" class="form-control" placeholder="{{__('tastier_life.chefs.edit.ph_twitter')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="linkedin_link">{{__('tastier_life.chefs.edit.data_linkedin')}}</label>
                        <input id="linkedin_link" name="linkedin_link" class="form-control" placeholder="{{__('tastier_life.chefs.edit.ph_linkedin')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="instagram_link">{{__('tastier_life.chefs.edit.data_instagram')}}</label>
                        <input id="instagram_link" name="instagram_link" class="form-control" placeholder="{{__('tastier_life.chefs.edit.ph_instagram')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="tiktok_link">{{__('tastier_life.chefs.edit.data_tiktok')}}</label>
                        <input id="tiktok_link" name="tiktok_link" class="form-control" placeholder="{{__('tastier_life.chefs.edit.ph_tiktok')}}"/>
                    </div>
                    <div class="row form-group py-5">
                        <div class="col-auto ms-auto"><a href="{{route('admin.tastier_life')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button class="btn btn-primary w-100">{{__('admin.btn_edit')}}</buttton></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
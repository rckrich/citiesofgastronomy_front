<!-- resources/views/admin/cities.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_cities" class="">
        <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-cities" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-banners-tab" data-bs-toggle="pill" data-bs-target="#pills-banners" type="button" role="tab" aria-controls="pills-banners" aria-selected="true">{{__('admin.main_site.section_banners')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-socials-tab" data-bs-toggle="pill" data-bs-target="#pills-socials" type="button" role="tab" aria-controls="pills-socials" aria-selected="false">{{__('admin.main_site.section_socials')}}</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-clusters-tab" data-bs-toggle="pill" data-bs-target="#pills-clusters" type="button" role="tab" aria-controls="pills-clusters" aria-selected="false">{{__('admin.main_site.section_cluster')}}</button>
            </li>
        </ul>
        <div class="tab-content px-5" id="pills-tab-citiesContent">
            <div class="tab-pane fade show active" id="pills-banners" role="tabpanel" aria-labelledby="pills-banners-tab">
                @include('admin.banners')
            </div>
            <div class="tab-pane fade" id="pills-socials" role="tabpanel" aria-labelledby="pills-socials-tab">
                <div class="py-3">                
                    <h3 class="admin-title"><b>{{__('admin.main_site.socials.title')}}</b></h3>
                    <form class="pb-5 my-3">
                        <div class="form-group py-2">
                            <label class="form-label" for="facebook_link">{{__('admin.main_site.socials.facebook')}}</label>
                            <input id="facebook_link" name="facebook_link" class="form-control" placeholder="{{__('admin.main_site.socials.ph')}}"/>
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label" for="twitter_link">{{__('admin.main_site.socials.twitter')}}</label>
                            <input id="twitter_link" name="twitter_link" class="form-control" placeholder="{{__('admin.main_site.socials.ph')}}"/>
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label" for="tiktok_link">{{__('admin.main_site.socials.tiktok')}}</label>
                            <input id="tiktok_link" name="tiktok_link" class="form-control" placeholder="{{__('admin.main_site.socials.ph')}}"/>
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label" for="instagram_link">{{__('admin.main_site.socials.instagram')}}</label>
                            <input id="instagram_link" name="instagram_link" class="form-control" placeholder="{{__('admin.main_site.socials.ph')}}"/>
                        </div>
                        <div class="row form-group py-5">
                            <button class="btn btn-primary mx-auto">{{__('admin.btn_save')}}</buttton>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-clusters" role="tabpanel" aria-labelledby="pills-clusters-tab">
                <div class="py-3">                
                    <h3 class="admin-title"><b>{{__('admin.main_site.clusters.title')}}</b></h3>
                    <form class="pb-5 my-3">
                        <div class="form-group py-2">
                            <label class="form-label" for="coordinator_link">{{__('admin.main_site.clusters.coordinator')}}</label>
                            <input id="coordinator_link" name="coordinator_link" class="form-control" placeholder="{{__('admin.main_site.clusters.coordinator_ph')}}"/>
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label" for="clustermail_link">{{__('admin.main_site.clusters.mail')}}</label>
                            <input id="clustermail_link" name="clustermail_link" class="form-control" placeholder="{{__('admin.main_site.clusters.mail_ph')}}"/>
                        </div>
                        <div class="form-group py-2">
                            <label class="form-label" for="clustercities_link">{{__('admin.main_site.clusters.cities')}}</label>
                            <input id="clustercities_link" name="clustercities_link" class="form-control" placeholder="{{__('admin.main_site.clusters.cities_ph')}}"/>
                        </div>
                        <div class="row form-group py-5">
                            <button class="btn btn-primary mx-auto">{{__('admin.btn_save')}}</buttton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
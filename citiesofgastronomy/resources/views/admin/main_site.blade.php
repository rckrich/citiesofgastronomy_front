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
                ...
            </div>
            <div class="tab-pane fade" id="pills-clusters" role="tabpanel" aria-labelledby="pills-clusters-tab">
                123
            </div>
        </div>
    </section>
@endsection
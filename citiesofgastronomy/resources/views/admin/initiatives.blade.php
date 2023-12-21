<!-- resources/views/admin/home.blade.php -->

@extends('commons.admin_base')

@section('content')
<section id="admin_initiatives">
    <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-initiatives" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-init-tab" data-bs-toggle="pill" data-bs-target="#pills-init" type="button" role="tab" aria-controls="pills-init" aria-selected="true">{{__('initiatives.init.title')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-filters-tab" data-bs-toggle="pill" data-bs-target="#pills-filters" type="button" role="tab" aria-controls="pills-filters" aria-selected="false">{{__('initiatives.filters.title')}}</button>
        </li>
    </ul>
    <div class="tab-content px-5" id="pills-tab-initiativesContent">
        <div class="tab-pane fade show active" id="pills-init" role="tabpanel" aria-labelledby="pills-init-tab">
            <div id="" class="container p-5">
                <div class="row mx-0">
                    <div class="col-12 px-0 py-2">
                        <h3 class="admin-title"><b>{{__('initiatives.init.admin_title')}}</b></h3>
                    </div>
                    <div class="col-12 px-0 text-right row mx-0 py-2">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                            <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('initiatives.init.search_ph')}}" aria-label="{{__('initiatives.init.search_ph')}}" aria-describedby="basic-addon1">
                        </div>
                        </div>
                    </div>
                    <div class="row col-12 px-0 py-2">
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <a class="btn btn-primary mx-auto" href="{{route('admin.initiatives_new')}}">{{__('initiatives.init.btn_add')}}</a>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 form-group">
                            <select id="select_sdg_filter" class="form-control h-100">
                                <option>{{__('initiatives.init.select_sdg')}}</option>
                            </select>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 form-group">
                            <select id="select_sdg_filter" class="form-control h-100">
                                <option>{{__('initiatives.init.select_topic')}}</option>
                            </select>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 form-group">
                            <select id="select_sdg_filter" class="form-control h-100">
                                <option>{{__('initiatives.init.select_connection')}}</option>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="row mx-0 pt-4">
                    <table class="table table-fixed">
                        <thead class="">
                            <tr>
                                <th class="col-8">{{__('initiatives.init.th_name')}}</th>
                                <th class="col-auto"></th>
                                <th class="col-auto"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="align-items-center">
                                <td class="col-8">Tittle. Lorem Ipsum is simply dummy text…</td>
                                <td class="col-auto my-auto">
                                    <a class="btn btn-link" href="{{route('admin.initiatives_edit',['id'=>1])}}">{{__('contact.admin.btn_edit')}}</a>
                                </td>                            
                                <td class="col-auto my-auto">
                                    <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteTimelineModal">{{__('admin.btn_delete')}}
                                </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-filters" role="tabpanel" aria-labelledby="pills-filters-tab">
        <ul class="nav nav-pills mb-3 py-2" id="pills-tab-filters" role="tablist">
            <li class="nav-item py-2 px-3" role="presentation">
                <button class="nav-link active" id="pills-activityType-tab" data-bs-toggle="pill" data-bs-target="#pills-activityType" type="button" role="tab" 
                aria-controls="pills-activityType" aria-selected="true">
                    {{__('initiatives.filters.tab_type')}}
                </button>
            </li>
            <li class="nav-item py-2 px-3" role="presentation">
                <button class="nav-link" id="pills-topics-tab" data-bs-toggle="pill" data-bs-target="#pills-topics" type="button" role="tab" 
                aria-controls="pills-topics" aria-selected="true">
                    {{__('initiatives.filters.tab_topic')}}
                </button>
            </li>
            <li class="nav-item py-2 px-3" role="presentation">
                <button class="nav-link" id="pills-sdg-tab" data-bs-toggle="pill" data-bs-target="#pills-sdg" type="button" role="tab" 
                aria-controls="pills-sdg" aria-selected="true">
                    {{__('initiatives.filters.tab_sdg')}}
                </button>
            </li>
            <li class="nav-item py-2 px-3" role="presentation">
                <button class="nav-link" id="pills-connections-tab" data-bs-toggle="pill" data-bs-target="#pills-connections" type="button" role="tab" 
                aria-controls="pills-connections" aria-selected="true">
                    {{__('initiatives.filters.tab_connection')}}
                </button>
            </li>
        </ul>
        <div class="tab-content px-3" id="pills-tab-filtersContent">
            <div class="tab-pane fade" id="pills-activityType" role="tabpanel" aria-labelledby="pills-activityType-tab">
                @include('initiatives.activity_types')
            </div>
            <div class="tab-pane fade" id="pills-topics" role="tabpanel" aria-labelledby="pills-topics-tab">
                @include('initiatives.topics')
            </div>
            <div class="tab-pane fade" id="pills-sdg" role="tabpanel" aria-labelledby="pills-sdg-tab">
                @include('initiatives.sdg')
            </div>
            <div class="tab-pane fade" id="pills-connections" role="tabpanel" aria-labelledby="pills-connections-tab">
                @include('initiatives.connections')
            </div>
        </div>
        </div>
    </div>
    </section>
@endsection
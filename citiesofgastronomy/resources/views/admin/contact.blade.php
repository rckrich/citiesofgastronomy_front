<!-- resources/views/admin/home.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_home">
    <div id="" class="container p-5">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('contact.admin.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('contact.admin.search_ph')}}" aria-label="{{__('contact.admin.search_ph')}}" aria-describedby="basic-addon1">
                    </div>
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                    <a class="btn btn-primary mx-auto" href="{{route('admin.contact_new')}}">{{__('contact.admin.btn_add')}}</a>
                    </div>
                </div>
            </div>
            <div class="row mx-0 pt-4">
                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-8"></th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="align-items-center">
                            <td class="col-8">Contact A Name</td>
                            <td class="col-auto my-auto">
                                <a class="btn btn-link" href="{{route('admin.contact_edit',['id'=>1])}}">{{__('contact.admin.btn_edit')}}</a>
                            </td>                           
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteContactModal">{{__('admin.btn_delete')}}</button>
                            </td>
                        </tr>
                        <tr class="align-items-center">
                            <td class="col-8">Contact A Name</td>
                            <td class="col-auto my-auto">
                                <a class="btn btn-link" href="{{route('admin.contact_edit',['id'=>1])}}">{{__('contact.admin.btn_edit')}}</a>
                            </td>                           
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteContactModal">{{__('admin.btn_delete')}}</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
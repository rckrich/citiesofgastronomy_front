<!-- resources/views/admin/tours.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_tours">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('tours.admin.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('tours.admin.search_ph')}}" aria-label="{{__('tours.admin.search_ph')}}" aria-describedby="basic-addon1">
                    </div>
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                    <a class="btn btn-primary mx-auto" href="{{route('admin.tour_new')}}">{{__('tours.admin.btn_add')}}</a>
                    </div>
                </div>
            </div>
            <div class="row mx-0 pt-4">
                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-4">{{__('tours.admin.th_name')}}</th>
                            <th class="col-4">{{__('tours.admin.th_city')}}</th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="align-items-center">
                            <td class="col-4">Tour</td>
                            <td class="col-4">City</td>
                            <td class="col-auto my-auto">
                                <a class="btn btn-link" href="{{route('admin.tour_edit',['id'=>1])}}">{{__('tours.admin.btn_edit')}}</a>
                            </td>                           
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteTourModal">{{__('admin.btn_delete')}}</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal DELETE TOUR-->
<div class="modal fade" id="deleteTourModal" tabindex="-1" aria-labelledby="deleteTourModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteTourModalLabel">{{__('tours.admin.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('tours.admin.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection
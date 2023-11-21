<!-- resources/views/admin/cities.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_cities">
        <div id="" class="container p-5">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('admin.cities.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('admin.cities.search_ph')}}" aria-label="{{__('admin.cities.search_ph')}}" aria-describedby="basic-addon1">
                    </div>
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <button class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#editCityModal">{{__('admin.cities.btn_add')}}</buttton>
                </div>
            </div>
            <div class="row mx-0 pt-4">
                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-8">{{__('admin.cities.th_name')}}</th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="align-items-center">
                            <td class="col-8">Name</td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editCityModal">{{__('admin.cities.btn_edit')}}</button>
                            </td>                            
                            <td class="col-auto my-auto">
                                <a class=" btn-link">{{__('admin.cities.btn_edit_full')}}</a>
                            </td>                            
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteCityModal">{{__('admin.cities.btn_delete')}}
                            </button></td>
                        </tr>
                        <tr class="align-items-center">
                            <td class="col-8">Name</td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editCityModal">{{__('admin.cities.btn_edit')}}</button>
                            </td>                            
                            <td class="col-auto my-auto">
                                <a class=" btn-link">{{__('admin.cities.btn_edit_full')}}</a>
                            </td>                            
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteCityModal">{{__('admin.cities.btn_delete')}}
                            </button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal CREATE/EDIT CITY-->
<div class="modal fade" id="editCityModal" tabindex="-1" aria-labelledby="editCityModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header px-4">
            <h5 class="modal-title" id="editCityModalLabel">{{__('admin.cities.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_city">{{__('admin.cities.data_city')}}</label>
                <input id="data_city" name="data_city" class="form-control" placeholder="{{__('admin.cities.ph_city')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_country">{{__('admin.cities.data_country')}}</label>
                <input id="data_country" name="data_country" class="form-control" placeholder="{{__('admin.cities.ph_country')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_continent">{{__('admin.cities.data_continent')}}</label>
                <input id="data_continent" name="data_continent" class="form-control" placeholder="{{__('admin.cities.ph_continent')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_population">{{__('admin.cities.data_population')}}</label>
                <input id="data_population" name="data_population" class="form-control" placeholder="{{__('admin.cities.ph_population')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_locations">{{__('admin.cities.data_locations')}}</label>
                <input id="data_locations" name="data_locations" class="form-control" placeholder="{{__('admin.cities.ph_locations')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_dyear">{{__('admin.cities.data_dyear')}}</label>
                <input id="data_dyear" name="data_dyear" class="form-control" placeholder="{{__('admin.cities.ph_dyear')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_">{{__('admin.cities.data_photo')}}</label>
                <div id="data_" name="data_" class="">
                <div class="mt-4 mb-3 row mx-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <img class="" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/></div>
            </div>
        </div>
                </div>
            </div>
        </div>
        <div class="modal-footer row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto">{{__('admin.btn_create')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal DELETE CITY-->
<div class="modal fade" id="deleteCityModal" tabindex="-1" aria-labelledby="deleteCityModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCityModalLabel">{{__('admin.cities.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
<!-- resources/views/admin/cities.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_cities">
        <div id="" class="container p-5">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('cities.admin.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('cities.admin.search_ph')}}" aria-label="{{__('cities.admin.search_ph')}}" aria-describedby="basic-addon1">
                    </div>
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                    <button class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#editCityModal">{{__('cities.admin.btn_add')}}</buttton>
                    </div>
                </div>
            </div>
            <div class="row mx-0 pt-4">
                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-8">{{__('cities.admin.th_name')}}</th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="align-items-center">
                            <td class="col-8">Name</td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editCityModal">{{__('cities.admin.btn_edit')}}</button>
                            </td>                            
                            <td class="col-auto my-auto">
                                <a class=" btn-link" href="{{route('admin.cities_edit',['id'=>1])}}">{{__('cities.admin.btn_edit_full')}}</a>
                            </td>                            
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteCityModal">{{__('admin.btn_delete')}}
                            </button></td>
                        </tr>
                        <tr class="align-items-center">
                            <td class="col-8">Name</td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editCityModal">{{__('cities.admin.btn_edit')}}</button>
                            </td>                            
                            <td class="col-auto my-auto">
                                <a class=" btn-link" href="{{route('admin.cities_edit',['id'=>1])}}">{{__('cities.admin.btn_edit_full')}}</a>
                            </td>                            
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteCityModal">{{__('admin.btn_delete')}}
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
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="editCityModalLabel">{{__('cities.admin.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_city">{{__('cities.admin.data_city')}}</label>
                <input id="data_city" name="data_city" class="form-control" placeholder="{{__('cities.admin.ph_city')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_country">{{__('cities.admin.data_country')}}</label>
                <input id="data_country" name="data_country" class="form-control" placeholder="{{__('cities.admin.ph_country')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_continent">{{__('cities.admin.data_continent')}}</label>
                <input id="data_continent" name="data_continent" class="form-control" placeholder="{{__('cities.admin.ph_continent')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_population">{{__('cities.admin.data_population')}}</label>
                <input id="data_population" name="data_population" class="form-control" placeholder="{{__('cities.admin.ph_population')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_locations">{{__('cities.admin.data_locations')}}</label>
                <input id="data_locations" name="data_locations" class="form-control" placeholder="{{__('cities.admin.ph_locations')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_dyear">{{__('cities.admin.data_dyear')}}</label>
                <input id="data_dyear" name="data_dyear" class="form-control" placeholder="{{__('cities.admin.ph_dyear')}}"/>
            </div>
            <div class="form-group py-2 row mx-0">                
                <p class="form-label px-0" for="new_city_img">{{__('cities.admin.data_photo')}}</p>
                <div class="col-6 p-4 load-img h-100 row mx-0 align-items-center text-center">
                    <label class="custom-file-upload" for="new_city_img">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                    </label>
                    <input type="file" class="text-center file-input" name="new_city_img" id="new_city_img">
                </div> 
            </div>    
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
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
        <h5 class="modal-title" id="deleteCityModalLabel">{{__('cities.admin.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('cities.admin.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection
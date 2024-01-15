<!-- resources/views/admin/users.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_users">
    <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('users.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('users.search_ph')}}" aria-label="{{__('users.search_ph')}}" aria-describedby="basic-addon1">
                    </div>
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                        <button class="btn btn-primary mx-auto"  data-bs-toggle="modal" data-bs-target="#createUserModal">{{__('users.btn_add')}}</button>
                    </div>
                </div>
            </div>
            <div class="row mx-0 pt-4">
                <table class="table table-fixed">
                    <thead class="">
                        <tr>
                            <th class="col-4">{{__('users.th_name')}}</th>
                            <th class="col-4">{{__('users.th_mail')}}</th>
                            <th class="col-auto"></th>
                            <th class="col-auto"></th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <tr class="align-items-center">
                            <td class="col-4">USER A name</td>
                            <td class="col-4">yourmail@gmail.com</td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editUserModal">{{__('users.btn_edit')}}</button>
                            </td>                           
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteUserModal">{{__('admin.btn_delete')}}</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


<!-- Modal CREATE USER-->
<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="createUserModalLabel">{{__('users.create_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_title">{{__('users.data_username')}}</label>
                <input id="data_title" name="data_title" class="form-control" placeholder="{{__('users.ph_username')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_link">{{__('users.data_mail')}}</label>
                <input id="data_link" name="data_link" class="form-control" placeholder="{{__('users.ph_mail')}}"/>
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

<!-- Modal EDIT USER-->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="editUserModalLabel">{{__('users.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_title">{{__('users.data_username')}}</label>
                <input id="data_title" name="data_title" class="form-control" placeholder="{{__('users.ph_username')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_link">{{__('users.data_mail')}}</label>
                <div class="row m-0 p-0 align-items-center">
                    <div class="col-8 px-0 form-group py-2">
                        <input id="data_link" name="data_link" class="form-control" placeholder="{{__('users.ph_mail')}}"/>
                    </div> 
                    <div class="col-4 px-0">
                        <button class="btn btn-secondary" type="button" id="editMailModalBtn" data-bs-toggle="modal" data-bs-target="#editMailModal">
                            <img class="p-2" style="background-color:#000" src="{{asset('assets/icons/admin_edit.svg')}}"/>
                        </button>
                    </div>

                </div>
            </div>
            <div class="form-group py-2"> 
                <button class="btn btn-dark w-100">{{__('users.btn_new_password')}}</button>
            </div>   
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto">{{__('admin.btn_edit')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal EDIT MAIL-->
<div class="modal fade" id="editMailModal" tabindex="-1" aria-labelledby="editMailModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="editMailModalLabel">{{__('users.create_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_title">{{__('users.data_username')}}</label>
                <input id="data_title" name="data_title" class="form-control" placeholder="{{__('users.ph_username')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_link">{{__('users.data_mail')}}</label>
                <input id="data_link" name="data_link" class="form-control" placeholder="{{__('users.ph_mail')}}"/>
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


    <!-- Modal DELETE USER-->
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteUserModalLabel">{{__('users.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('users.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>
@endsection
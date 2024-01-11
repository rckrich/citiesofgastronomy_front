
<div id="" class="container p-5">
    <div class="row mx-0">
        <div class="col-12 px-0 py-2">
            <h3 class="admin-title"><b>{{__('initiatives.filters.type.admin_title')}}</b></h3>
        </div>
        <div class="col-12 px-0 text-right row mx-0 py-2">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('initiatives.filters.type.search_ph')}}" aria-label="{{__('initiatives.filters.type.search_ph')}}" aria-describedby="basic-addon1">
            </div>
            </div>
        </div>
        <div class="col-12 px-0 py-2">
            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
            <button class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#editActivityModal">{{__('initiatives.filters.type.btn_add')}}</buttton>
            </div>
        </div>
    </div>
    <div class="row mx-0 pt-4">
        <table class="table table-fixed">
            <thead class="">
                <tr>
                    <th class="col-8">{{__('initiatives.filters.type.th_name')}}</th>
                    <th class="col-auto"></th>
                    <th class="col-auto"></th>
                </tr>
            </thead>
            <tbody class="">
                <tr class="align-items-center">
                    <td class="col-8">Best Practice</td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editActivityModal">{{__('initiatives.btn_edit')}}</button>
                    </td>                             
                    <td class="col-auto my-auto">
                        <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteActivityModal">{{__('admin.btn_delete')}}
                    </button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<!-- Modal CREATE/EDIT-->
<div class="modal fade" id="editActivityModal" tabindex="-1" aria-labelledby="editActivityModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="createActivityModalLabel">{{__('initiatives.filters.type.create_modal_title')}}</h5>
            <h5 class="modal-title" id="editActivityModalLabel">{{__('initiatives.filters.type.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_title">{{__('initiatives.filters.type.data_type')}}</label>
                <input id="data_title" name="data_title" class="form-control" placeholder="{{__('initiatives.filters.type.ph_type')}}"/>
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

<!-- Modal DELETE-->
<div class="modal fade" id="deleteActivityModal" tabindex="-1" aria-labelledby="deleteActivityModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteActivityModalLabel">{{__('initiatives.filters.type.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('initiatives.filters.type.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>
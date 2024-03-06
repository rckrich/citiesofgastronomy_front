
<div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
    <div class="row mx-0">
        <div class="col-12 px-0 py-2">
            <h3 class="admin-title"><b>{{__('initiatives.filters.sdg.admin_title')}}</b></h3>
        </div>
        <div class="col-12 px-0 text-right row mx-0 py-2">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 ps-2 pe-0 ms-0 ms-lg-auto ms-md-auto">
            <form action="../admin/initiatives?section=filters&sub=sdg" method="POST" id="searchForm_sdg">
            @csrf
            <div class="input-group">
                <span class="input-group-text" id="search_sdg_label"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                <input id="search_box" name="search_box" value="<?php if($sub=='sdg'){echo $search_box;}?>" class="form-control" type="search" placeholder="{{__('initiatives.filters.sdg.search_ph')}}" aria-label="{{__('initiatives.filters.sdg.search_ph')}}" aria-describedby="search_sdg_label">
            </div>
            </form>
            </div>
        </div>
        <div class="col-12 px-0 py-2">
            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
            <button class="btn btn-primary mx-auto" onclick="openModal_sdg()">{{__('initiatives.filters.sdg.btn_add')}}</buttton>
            </div>
        </div>
    </div>
    <div class="row mx-0 pt-4">
        <table class="table table-fixed">
            <thead class="">
                <tr>
                    <th class="col-auto"></th>
                    <th class="col-8">{{__('initiatives.filters.sdg.th_name')}}</th>
                    <th class="col-auto"></th>
                    <th class="col-auto"></th>
                </tr>
            </thead>
            <tbody class="">

                @foreach($sdg as $item)
                <tr class="align-items-center">
                    <td class="col-auto">{{$item["number"]}}</td>
                    <td class="col-7">{{$item["name"]}}</td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editSDGModal" onclick="openModal_sdg({{$item['id']}},'{{$item['name']}}',{{$item['number']}})">{{__('initiatives.btn_edit')}}</button>
                    </td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteSDGModal" onclick="openDeleteModal_sdg({{$item['id']}})">{{__('admin.btn_delete')}}
                    </button></td>
                </tr>
                @endforeach
                @if( count($sdg) == 0)
                    <tr class="align-items-center">
                        <td class="col-8">{{__('general.no_results')}}</td>
                        <td class="col-auto"></td>
                        <td class="col-auto"></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>


<!-- Modal CREATE/EDIT-->
<div class="modal fade" id="editSDGModal" tabindex="-1" aria-labelledby="editSDGModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <input type="hidden" id="data_sdg_id">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title create-modal-label" id="createSDGModalLabel">{{__('initiatives.filters.sdg.create_modal_title')}}</h5>
            <h5 class="modal-title edit-modal-label" id="editSDGModalLabel">{{__('initiatives.filters.sdg.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_sdg_name">{{__('initiatives.filters.sdg.ph_type')}}</label>
                <input id="data_sdg_name" name="data_sdg_name" class="form-control" placeholder="{{__('initiatives.filters.sdg.ph_type')}}"/>
                <div id="validation_data_sdg_name" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_sdg_number">{{__('initiatives.filters.sdg.data_number')}}</label>
                <input id="data_sdg_number" name="data_sdg_number" class="form-control" placeholder="{{__('initiatives.filters.sdg.ph_type')}}"/>
                <div id="validation_data_sdg_number" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto create-form-btn" id="sdg_btn" onclick="saveSdg()">{{__('admin.btn_create')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto edit-form-btn" id="update_sdg_btn" onclick="saveSdg()">{{__('admin.btn_edit')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal DELETE-->
<div class="modal fade" id="deleteSDGModal" tabindex="-1" aria-labelledby="deleteSDGModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteSDGModalLabel">{{__('initiatives.filters.sdg.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <input type="hidden" id="delete_data_sdg_id">
            <p>{{__('initiatives.filters.sdg.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" onclick="deleteSdg()">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>


<script>
    function openModal_sdg(id,name,number){
        editModal_sdg.show(modalToggle_sdg);
        enableBtns();
        resetValidations();
        if(!id){
            $('#editSDGModal').addClass('create-form');
            $('#editSDGModal').removeClass('edit-form');

            document.getElementById("data_sdg_id").value = '';
            document.getElementById("data_sdg_name").value = '';
            document.getElementById("data_sdg_number").value = '';
        }
        if(id){
            $('#editSDGModal').removeClass('create-form');
            $('#editSDGModal').addClass('edit-form');

            document.getElementById("data_sdg_id").value = id;
            document.getElementById("data_sdg_number").value = number;
            document.getElementById("data_sdg_name").value = name;
        };
    }

    function saveSdg(){
        disableBtns();
        resetValidations();

        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("data_sdg_id").value;
        datos.append('id', data_id);
        let data_name = document.getElementById("data_sdg_name").value;
        datos.append('name', data_name);
        let data_number = document.getElementById("data_sdg_number").value;
        datos.append('number', data_number);

        if(data_name && data_number){
                $.ajax({
                        type: 'POST',
                        url: '/admin/initiatives/sdg/store',
                        data: datos,
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){},
                        success: function(msg){
                            enableBtns();
                            if (msg.status===400) {
                                alert("Error: " + msg.message);
                            } 
                            else {
                                editModal_sdg.hide(modalToggle_sdg);
                                alert(msg.message);
                                window.location = '../../admin/initiatives?section=filters&sub=sdg';
                               
                            }
                        }
                });
        }else{
            enableBtns();
            showValidationMessages();
        };
    }

    function disableBtns(){
        document.getElementById("sdg_btn").disabled = true;
        document.getElementById("update_sdg_btn").disabled = true;
    }
    function enableBtns(){
        document.getElementById("sdg_btn").disabled = false;
        document.getElementById("update_sdg_btn").disabled = false;
    }
    function showValidationMessages(){
        document.getElementById("validation_data_sdg_name").style.display = 'block';
        document.getElementById("validation_data_sdg_number").style.display = 'block';
    }
    function resetValidations(){//reseteo todas las leyendas de validaciones
        document.getElementById("validation_data_sdg_name").style.display = 'none';
        document.getElementById("validation_data_sdg_number").style.display = 'none';
    }

    function openDeleteModal_sdg(id){
        document.getElementById("delete_data_sdg_id").value = id;
    }
    function deleteSdg(){
        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("delete_data_sdg_id").value;
        datos.append('id', data_id);

        if(data_id){
            $.ajax({
                type: 'POST',
                url: '/admin/initiatives/sdg/delete',
                data: datos,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){},
                success: function(msg){
                    closeModal('deleteSDGModal');
                    if (msg.status===400) {
                        alert("Error: " + msg.message);
                    } 
                    else {
                        alert('{{trans('initiatives.filters.delete_success')}}');
                        window.location = '../../admin/initiatives?section=filters&sub=sdg';
                    }
                }
            });
        }
    }

</script>

<script>
    $("#search_box").keypress(function (e) {
      var key = e.which;
      if(key == 13)  // the enter key code
      {
        let keyword = $("#search_box").val();

        if(keyword){
            $('#searchForm_sdg').submit();
        }
        else{
            window.location = '../../admin/initiatives?section=filters&sub=sdg';
        }
      }
     }); 
</script>

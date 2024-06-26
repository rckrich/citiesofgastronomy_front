
<div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
    <div class="row mx-0">
        <div class="col-12 px-0 py-2">
            <h3 class="admin-title"><b>{{__('initiatives.filters.type.admin_title')}}</b></h3>
        </div>
        <div class="col-12 px-0 text-right row mx-0 py-2">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 ps-2 pe-0 ms-0 ms-lg-auto ms-md-auto">
            <form action="../admin/initiatives?section=filters&sub=actype" method="POST" id="searchForm_type">
            @csrf
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                <input id="search_box" name="search_box" value="<?php if($sub=='actype'){echo $search_box;}?>" class="form-control" type="search" placeholder="{{__('initiatives.filters.type.search_ph')}}" aria-label="{{__('initiatives.filters.type.search_ph')}}" aria-describedby="basic-addon1">
            </div>
            </form>
            </div>
        </div>
        <div class="col-12 px-0 py-2">
            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
            <button class="btn btn-primary mx-auto" onclick="openModal_type()">{{__('initiatives.filters.type.btn_add')}}</buttton>
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

                @foreach($typeOfActivity as $item)
                <tr class="align-items-center">
                    <td class="col-8">{{$item["name"]}}</td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editActivityModal" onclick="openModal_type({{$item['id']}},'{{$item['name']}}')">{{__('initiatives.btn_edit')}}</button>
                    </td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteActivityModal" onclick="openDeleteModal_type({{$item['id']}})">{{__('admin.btn_delete')}}
                    </button></td>
                </tr>
                @endforeach
                @if( count($typeOfActivity) == 0)
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
<div class="modal fade" id="editActivityModal" tabindex="-1" aria-labelledby="editActivityModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <input type="hidden" id="data_type_id">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title create-modal-label" id="createActivityModalLabel">{{__('initiatives.filters.type.create_modal_title')}}</h5>
            <h5 class="modal-title edit-modal-label" id="editActivityModalLabel">{{__('initiatives.filters.type.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_type_name">{{__('initiatives.filters.type.data_type')}}</label>
                <input id="data_type_name" name="data_type_name" class="form-control" placeholder="{{__('initiatives.filters.type.ph_type')}}"/>

                <div id="validation_data_type_name" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto create-form-btn" id="type_btn" onclick="saveType()">{{__('admin.btn_create')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto edit-form-btn" id="update_type_btn" onclick="saveType()">{{__('admin.btn_edit')}}</buttton>
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
            <input type="hidden" id="delete_data_type_id">
            <p>{{__('initiatives.filters.type.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" onclick="deleteType()">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>


<script>
    function openModal_type(id, name){
        editModal_type.show(modalToggle_type);
        enableBtns();
        document.getElementById("validation_data_type_name").style.display = 'none';
        if(!id){
            $('#editActivityModal').addClass('create-form');
            $('#editActivityModal').removeClass('edit-form');

            document.getElementById("data_type_id").value = '';
            document.getElementById("data_type_name").value = '';
        };
        if(id){
            $('#editActivityModal').removeClass('create-form');
            $('#editActivityModal').addClass('edit-form');

            document.getElementById("data_type_id").value = id;
            document.getElementById("data_type_name").value = name;
        };
    }

    function saveType(){
        disableBtns();
        //reseteo todas las leyendas de validaciones
        document.getElementById("validation_data_type_name").style.display = 'none';

        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("data_type_id").value;
        datos.append('id', data_id);
        let data_name = document.getElementById("data_type_name").value;
        datos.append('name', data_name);


        //if(false){
        let id1 = '';
        if(data_name){
                $.ajax({
                        type: 'POST',
                        url: '/admin/initiatives/typeOfActivity/store',
                        data: datos,
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){},
                        success: function(msg){
                            let e = JSON.parse(msg);
                            enableBtns();
                            if (e.status===400) {
                                alert("Error: " + e.message);
                            }
                            else if(e.status===401){
                                alert("Error: " + e.message);
                                window.location = '/login';
                            }
                            else {
                                editModal_type.hide(modalToggle_type);
                                //alert(msg.message);
                                localStorage.setItem('messageIniciative', e.message);
                                window.location = '../../admin/initiatives?section=filters&sub=actype';
                            }
                        }
                });
        }else{
            enableBtns();
            document.getElementById("validation_data_type_name").style.display = 'block';

        };
    }

    function disableBtns(){
        document.getElementById("type_btn").disabled = true;
        document.getElementById("update_type_btn").disabled = true;
    }
    function enableBtns(){
        document.getElementById("type_btn").disabled = false;
        document.getElementById("update_type_btn").disabled = false;
    }

    function openDeleteModal_type(id){
        document.getElementById("delete_data_type_id").value = id;
    }
    function deleteType(){
        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("delete_data_type_id").value;
        datos.append('id', data_id);

        if(data_id){
            $.ajax({
                type: 'POST',
                url: '/admin/initiatives/typeOfActivity/delete',
                data: datos,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){},
                success: function(msg){
                    let e = JSON.parse(msg);
                    closeModal('deleteActivityModal');
                    if (e.status===400) {
                        alert("Error: " + e.message);
                    }
                    else if(e.status===401){
                        alert("Error: " + e.message);
                        window.location = '/login';
                    }
                    else {
                        //alert('{{trans('initiatives.filters.delete_success')}}');
                        localStorage.setItem('messageIniciative', '{{trans('initiatives.filters.delete_success')}}');
                        window.location = '../../admin/initiatives?section=filters&sub=actype';
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
            $('#searchForm_type').submit();
        }
        else{
            window.location = '../../admin/initiatives?section=filters&sub=actype';
        }
      }
     });
</script>

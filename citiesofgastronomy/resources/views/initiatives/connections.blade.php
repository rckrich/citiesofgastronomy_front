
<div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
    <div class="row mx-0">
        <div class="col-12 px-0 py-2">
            <h3 class="admin-title"><b>{{__('initiatives.filters.connection.admin_title')}}</b></h3>
        </div>
        <div class="col-12 px-0 text-right row mx-0 py-2">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                <input name="search_box_connections" class="form-control me-2" type="search" placeholder="{{__('initiatives.filters.connection.search_ph')}}" aria-label="{{__('initiatives.filters.connection.search_ph')}}" aria-describedby="basic-addon1">
            </div>
            </div>
        </div>
        <div class="col-12 px-0 py-2">
            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
            <button class="btn btn-primary mx-auto" onclick="openModal_connection()">{{__('initiatives.filters.connection.btn_add')}}</buttton>
            </div>
        </div>
    </div>
    <div class="row mx-0 pt-4">
        <table class="table table-fixed">
            <thead class="">
                <tr>
                    <th class="col-8">{{__('initiatives.filters.connection.th_name')}}</th>
                    <th class="col-auto"></th>
                    <th class="col-auto"></th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($ConnectionsToOther as $item)
                <tr class="align-items-center">
                    <td class="col-8">{{$item["name"]}}</td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editConnectionModal">{{__('initiatives.btn_edit')}}</button>
                    </td>                             
                    <td class="col-auto my-auto">
                        <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteConnectionModal">{{__('admin.btn_delete')}}
                    </button></td>
                </tr>
                @endforeach
                @if( count($ConnectionsToOther) == 0)
                    <tr class="align-items-center">
                        <td class="col-8">No results found</td>
                        <td class="col-auto"></td>
                        <td class="col-auto"></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>


<!-- Modal CREATE/EDIT-->
<div class="modal fade" id="editConnectionModal" tabindex="-1" aria-labelledby="editConnectionModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <input type="hidden" id="data_connection_id">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="createActivityModalLabel">{{__('initiatives.filters.connection.create_modal_title')}}</h5>
            <h5 class="modal-title" id="editConnectionModalLabel">{{__('initiatives.filters.connection.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_connection_name">{{__('initiatives.filters.connection.data_type')}}</label>
                <input id="data_connection_name" name="data_connection_name" class="form-control" placeholder="{{__('initiatives.filters.connection.ph_type')}}"/>
                <div id="validation_data_connection_name" class="invalid-feedback">Obligatory field</div>
            </div>   
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto" id="connection_btn" onclick="saveConnection()">{{__('admin.btn_create')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal DELETE-->
<div class="modal fade" id="deleteConnectionModal" tabindex="-1" aria-labelledby="deleteConnectionModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConnectionModalLabel">{{__('initiatives.filters.connection.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('initiatives.filters.connection.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>

<script>
    function openModal_connection(id){
        editModal_connection.show(modalToggle_connection);
        document.getElementById("connection_btn").disabled = false;
        document.getElementById("validation_data_connection_name").style.display = 'none';
        if(!id){
            document.getElementById("data_connection_id").value = '';
            document.getElementById("data_connection_name").value = '';
        };
    }
    function saveConnection(){
        console.log("#-> ingresa al SAVE");
        let guardar = 1;
        document.getElementById("connection_btn").disabled = true;

        //reseteo todas las leyendas de validaciones
        document.getElementById("validation_data_connection_name").style.display = 'none';

        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("data_connection_id").value;
        datos.append('id', data_id);
        let data_name = document.getElementById("data_connection_name").value;
        datos.append('name', data_name);


        //if(false){
            let id1 = '';
        if(data_name){
            $.ajax({
                    type: 'POST',
                    url: '/admin/initiatives/connection/store',
                    data: datos,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){             },
                    success: function(msg){
                        document.getElementById("connection_btn").disabled = false;
                        if (msg.status===400) {
                            alert("Error: " + msg.message);
                        } 
                        else {
                            editModal_connection.hide(modalToggle_connection);
                            if(data_id){
                                alert(msg.message);
                            }else{
                                alert(msg.message);
                                window.location = '../../admin/initiatives?section=filters&sub=connections';
                            };
                        }
                    }
                    });
        }else{
            document.getElementById("connection_btn").disabled = false;
            document.getElementById("validation_data_connection_name").style.display = 'block';
           // editModal_connection.hide(modalToggle_topic);
        };
    }

</script>
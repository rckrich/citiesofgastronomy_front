
<div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
    <div class="row mx-0">
        <div class="col-12 px-0 py-2">
            <h3 class="admin-title"><b>{{__('initiatives.filters.sdg.admin_title')}}</b></h3>
        </div>
        <div class="col-12 px-0 text-right row mx-0 py-2">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
            <!--form-->
            <div class="input-group">
                <span class="input-group-text" id="search_sdg_label"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                <input id="search_box_sdg" name="search_box_sdg" class="form-control me-2" type="search" placeholder="{{__('initiatives.filters.sdg.search_ph')}}" aria-label="{{__('initiatives.filters.sdg.search_ph')}}" aria-describedby="search_sdg_label">
            </div>
            <!--/form-->
            </div>
        </div>
        <div class="col-12 px-0 py-2">
            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
            <button class="btn btn-primary mx-auto"  onclick="openModal_sdg()">{{__('initiatives.filters.sdg.btn_add')}}</buttton>
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
                        <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editSDGModal">{{__('initiatives.btn_edit')}}</button>
                    </td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteSDGModal">{{__('admin.btn_delete')}}
                    </button></td>
                </tr>
                @endforeach
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
            <h5 class="modal-title" id="createActivityModalLabel">{{__('initiatives.filters.sdg.create_modal_title')}}</h5>
            <h5 class="modal-title" id="editSDGModalLabel">{{__('initiatives.filters.sdg.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_sdg_name">{{__('initiatives.filters.sdg.ph_type')}}</label>
                <input id="data_sdg_name" name="data_sdg_name" class="form-control" placeholder="{{__('initiatives.filters.sdg.ph_type')}}"/>
                <div id="validation_data_sdg_name" class="invalid-feedback">Obligatory field</div>
            </div>
        </div>
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_sdg_number">{{__('initiatives.filters.sdg.data_number')}}</label>
                <input id="data_sdg_number" name="data_sdg_number" class="form-control" placeholder="{{__('initiatives.filters.sdg.ph_type')}}"/>
                <div id="validation_data_sdg_number" class="invalid-feedback">Obligatory field</div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto" id="sdg_btn" onclick="saveSdg()">{{__('admin.btn_create')}}</buttton>
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
            <p>{{__('initiatives.filters.sdg.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>


<script>
    function openModal_sdg(id){
        editModal_sdg.show(modalToggle_sdg);
        document.getElementById("sdg_btn").disabled = false;
        document.getElementById("validation_data_sdg_name").style.display = 'none';
        document.getElementById("validation_data_sdg_number").style.display = 'none';
        if(!id){
            document.getElementById("data_sdg_id").value = '';
            document.getElementById("data_sdg_name").value = '';
            document.getElementById("data_sdg_number").value = '';
        };
    }

    function saveSdg(){
        //console.log("#-> ingresa al SAVE");
        let guardar = 1;
        document.getElementById("sdg_btn").disabled = true;

        //reseteo todas las leyendas de validaciones
        document.getElementById("validation_data_sdg_name").style.display = 'none';
        document.getElementById("validation_data_sdg_number").style.display = 'none';

        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("data_sdg_id").value;
        datos.append('id', data_id);
        let data_name = document.getElementById("data_sdg_name").value;
        datos.append('name', data_name);
        let data_number = document.getElementById("data_sdg_number").value;
        datos.append('number', data_number);


        //if(false){
        let id1 = '';
        if(data_name){
                $.ajax({
                        type: 'POST',
                        url: '/admin/initiatives/sdg/store',
                        data: datos,
                        contentType: false,
                        cache: false,
                        processData:false,
                        beforeSend: function(){},
                        success: function(msg){
                            document.getElementById("sdg_btn").disabled = false;
                            if (msg.status===400) {
                                alert("Error: " + msg.message);
                            } 
                            else {
                                editModal_sdg.hide(modalToggle_sdg);
                                if(data_id){
                                    alert(msg.message);
                                }else{
                                    alert(msg.message);
                                    window.location = '../../admin/initiatives?section=filters&sub=sdg';
                                };
                            }
                        }
                });
        }else{
            document.getElementById("sdg_btn").disabled = false;
            document.getElementById("validation_data_sdg_name").style.display = 'block';
            document.getElementById("validation_data_sdg_number").style.display = 'block';

        };
    }

</script>

<script>
    $("#search_box_sdg").keypress(function (e) {
      var key = e.which;
      if(key == 13)  // the enter key code
      {
        //let search_sdg = document.getElementById("search_box_sdg").value;
        let search_sdg = $("#search_box_sdg").val().toLowerCase();

       alert(search_sdg)
      }
      else{}
     }); 
</script>

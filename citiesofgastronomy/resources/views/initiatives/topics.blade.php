
<div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
    <div class="row mx-0">
        <div class="col-12 px-0 py-2">
            <h3 class="admin-title"><b>{{__('initiatives.filters.topic.admin_title')}}</b></h3>
        </div>
        <div class="col-12 px-0 text-right row mx-0 py-2">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
            <form action="../admin/initiatives?section=filters&sub=topics" method="POST" id="searchForm_topic">
            @csrf
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                <input id="search_box" name="search_box" class="form-control me-2" type="search" placeholder="{{__('initiatives.filters.topic.search_ph')}}" aria-label="{{__('initiatives.filters.topic.search_ph')}}" aria-describedby="basic-addon1">
            </div>
            </form>
            </div>
        </div>
        <div class="col-12 px-0 py-2">
            <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
            <button class="btn btn-primary mx-auto" onclick="openModal_topic()">{{__('initiatives.filters.topic.btn_add')}}</buttton>
            </div>
        </div>
    </div>
    <div class="row mx-0 pt-4">
        <table class="table table-fixed">
            <thead class="">
                <tr>
                    <th class="col-8">{{__('initiatives.filters.topic.th_name')}}</th>
                    <th class="col-auto"></th>
                    <th class="col-auto"></th>
                </tr>
            </thead>
            <tbody class="">
                @foreach($Topics as $item)
                <tr class="align-items-center">
                    <td class="col-8">{{$item["name"]}}</td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editTopicModal" onclick="openModal_topic({{$item['id']}},'{{$item['name']}}')">{{__('initiatives.btn_edit')}}</button>
                    </td>
                    <td class="col-auto my-auto">
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTopicModal" onclick="openDeleteModal_topic({{$item['id']}})">{{__('admin.btn_delete')}}
                    </button></td>
                </tr>
                @endforeach
                @if( count($Topics) == 0)
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
<div class="modal fade" id="editTopicModal" tabindex="-1" aria-labelledby="editTopicModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <input type="hidden" id="data_topic_id">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title create-modal-label" id="createActivityModalLabel">{{__('initiatives.filters.topic.create_modal_title')}}</h5>
            <h5 class="modal-title edit-modal-label" id="editTopicModalLabel">{{__('initiatives.filters.topic.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_topic_name">{{__('initiatives.filters.topic.data_type')}}</label>
                <input id="data_topic_name" name="data_topic_name" class="form-control" placeholder="{{__('initiatives.filters.topic.ph_type')}}"/>

                <div id="validation_data_topic_name" class="invalid-feedback">Obligatory field</div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto create-form-btn" id="topic_btn" onclick="saveTopic()">{{__('admin.btn_create')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto edit-form-btn" id="update_topic_btn" onclick="saveTopic()">{{__('admin.btn_edit')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

<!-- Modal DELETE-->
<div class="modal fade" id="deleteTopicModal" tabindex="-1" aria-labelledby="deleteTopicModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteTopicModalLabel">{{__('initiatives.filters.topic.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <input type="hidden" id="delete_data_topic_id">
            <p>{{__('initiatives.filters.topic.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" onclick="deleteTopic()">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>
<script>
    function openModal_topic(id, name){
        editModal_topic.show(modalToggle_topic);
        enableBtns();
        document.getElementById("validation_data_topic_name").style.display = 'none';
        if(!id){
            $('#editTopicModal').addClass('create-form');
            $('#editTopicModal').removeClass('edit-form');
            document.getElementById("data_topic_id").value = '';
            document.getElementById("data_topic_name").value = '';
        };
        if(id){
            $('#editTopicModal').removeClass('create-form');
            $('#editTopicModal').addClass('edit-form');

            document.getElementById("data_topic_id").value = id;
            document.getElementById("data_topic_name").value = name;
        };
    }
    function saveTopic(){
        disableBtns();
        //reseteo todas las leyendas de validaciones
        document.getElementById("validation_data_topic_name").style.display = 'none';

        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("data_topic_id").value;
        datos.append('id', data_id);
        let data_name = document.getElementById("data_topic_name").value;
        datos.append('name', data_name);

        if(data_name){
            $.ajax({
                    type: 'POST',
                    url: '/admin/initiatives/topic/store',
                    data: datos,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){             },
                    success: function(msg){
                        enableBtns();
                        if (msg.status===400) {
                            alert("Error: " + msg.message);
                        } 
                        else {
                            editModal_topic.hide(modalToggle_topic);
                            alert(msg.message);
                            window.location = '../../admin/initiatives?section=filters&sub=topics';
                        }
                    }
                    });
        }else{
            enableBtns();
            document.getElementById("validation_data_topic_name").style.display = 'block';
        };
    }
    function disableBtns(){
        document.getElementById("topic_btn").disabled = true;
        document.getElementById("update_topic_btn").disabled = true;
    }
    function enableBtns(){
        document.getElementById("topic_btn").disabled = false;
        document.getElementById("update_topic_btn").disabled = false;
    }

    
    function openDeleteModal_topic(id){
        document.getElementById("delete_data_topic_id").value = id;
    }
    function deleteTopic(){
        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("delete_data_topic_id").value;
        datos.append('id', data_id);

        if(data_id){
            $.ajax({
                type: 'POST',
                url: '/admin/initiatives/topic/delete',
                data: datos,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){},
                success: function(msg){
                    closeModal('deleteTopicModal');
                    if (msg.status===400) {
                        alert("Error: " + msg.message);
                    } 
                    else {
                        alert(msg.message);
                        window.location = '../../admin/initiatives?section=filters&sub=topics';
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
            $('#searchForm_topic').submit();
        }
        else{
            window.location = '../../admin/initiatives?section=filters&sub=topics';
        }
      }
     }); 
</script>

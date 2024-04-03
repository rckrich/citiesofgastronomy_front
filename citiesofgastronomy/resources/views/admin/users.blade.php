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
                    <form action="{{'/admin/users?page='.$page}}" method="POST" id="searchForm_user">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input name="search_box" class="form-control me-2" value="<?= $search_box?>" type="search"  placeholder="{{__('users.search_ph')}}" aria-label="{{__('users.search_ph')}}" aria-describedby="basic-addon1">
                        <input type="hidden" id="page" name="page" value="<?php if($search_box!=''){echo  $page;}else{echo '1';};?>">
                        <input type="hidden" id="pageActual" name="pageActual" value="<?php echo $page?>">
                    </div>
                    </form>
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
                        @foreach($users as $item)
                        <tr class="align-items-center">
                            <td class="col-4">{{$item['name']}}</td>
                            <td class="col-4">{{$item['email']}}</td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editUserModal">{{__('users.btn_edit')}}</button>
                            </td>                           
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteUserModal">{{__('admin.btn_delete')}}</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation tours">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" onclick="paginator('prev')">Previous</a></li>
                        @for($i=1;$i < $paginator +1; $i++)
                        <li class="page-item"><a class="page-link" onclick="paginator('<?= $i?>')"><?= $i?></a></li>
                        @endfor
                        <li class="page-item"><a class="page-link" onclick="paginator('next')">Next</a></li>
                    </ul>
                </nav>
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

<script>
function paginator(page){
    let search = $("#search_box").val();
    let paginatorCant = '<?= $paginator?>';
    paginatorCant = parseInt(paginatorCant);
    let paginaActual = document.getElementById('pageActual').value;
    paginaActual= parseInt(paginaActual);
    if (search != ''){
        paginaActual = document.getElementById('page').value;
        paginaActual= parseInt(paginaActual);
    };

    let nada = '';
    if(page == 'prev' || page == 'next'){
        if(page == 'next' && paginaActual != paginatorCant){
            page = paginaActual + 1;
        }else if(page == 'prev' && paginaActual > 1){
            page = paginaActual - 1;
        }else{
            nada = 'si';
        };
    }else{
        page= parseInt(page);
    };
    alert('actual page:' + paginaActual + 'page:'+page);
    if(nada == ''){
        if (search == ''){
            console.log("#not SEARCH");
            window.location = '/admin/users?page='+page;
        }else{
            console.log("# SEARCH");console.log(search);
            document.getElementById('page').value = page;
            document.getElementById('searchForm_user').submit();
        };
    };
}

function openDeleteModal_tour(id){
    document.getElementById("delete_data_tour_id").value = id;
}
function deleteTour(){
    let datos = new FormData();
    let token = document.getElementsByName("_token")[0].value;
    datos.append('_token', token);
    let data_id = document.getElementById("delete_data_tour_id").value;
    datos.append('id', data_id);
    if(data_id){
        $.ajax({
            type: 'POST',
            url: '/admin/users/delete',
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){},
            success: function(msg){                    
                closeModal('deleteTourModal');
                if (msg.status===400) {
                    alert("Error: " + msg.message);
                    window.location = '/admin/users?page=1';
                } 
                else {
                    alert('{{trans('tastier_life.chefs.delete_success')}}');
                    window.location = '/admin/users?page=1';
                }
            }
        });
    }
}


$("#search_box").keypress(function (e) {
    var key = e.which;
    if(key == 13)  // the enter key code
    {
    let keyword = $("#search_box").val();

    if(keyword){
        $('#searchForm_user').submit();
    }
    else{
        window.location = '../../admin/users?page=1';
    }
    }
    }); 

</script>

@endsection
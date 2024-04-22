<!-- resources/views/admin/users.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_users">
    <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="alert alert-success" role="alert" id="alertMessage" style="display:none"></div>
                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert" id="alertMessageAlert" style="display:none"></div>
                @endif

                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('users.title')}}</b></h3>
                </div>
                <div class="col-12 px-0 text-right row mx-0 py-2">
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                    <form action="{{'/admin/users?page='.$page}}" method="POST" id="searchForm_user">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                        <input id="search_box"  name="search_box" class="form-control me-2" value="<?= $search_box?>" type="search"  placeholder="{{__('users.search_ph')}}" aria-label="{{__('users.search_ph')}}" aria-describedby="basic-addon1">
                        <input type="hidden" id="page" name="page" value="<?php if($search_box!=''){echo  $page;}else{echo '1';};?>">
                        <input type="hidden" id="pageActual" name="pageActual" value="<?php echo $page?>">
                    </div>
                    </form>
                    </div>
                </div>
                <div class="col-12 px-0 py-2">
                    <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                        <button class="btn btn-primary mx-auto"  data-bs-toggle="modal" data-bs-target="#editUserModal" onclick="openModal_user()">{{__('users.btn_add')}}</button>
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
                                <button class="btn btn-link"  data-bs-toggle="modal" data-bs-target="#editUserModal" onclick="openModal_user({{$item['id']}},'{{$item['name']}}','{{$item['email']}}')">{{__('users.btn_edit')}}</button>
                            </td>
                            <td class="col-auto my-auto">
                                <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteUserModal" onclick="openDeleteModal_user({{$item['id']}})">{{__('admin.btn_delete')}}</button>
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


<!-- Modal CREATE/EDIT USER-->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
        <input type="hidden" id="data_id">
        <input type="hidden" id="data_temp_mail">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title create-modal-label" id="createUserModalLabel">{{__('users.create_modal_title')}}</h5>
            <h5 class="modal-title edit-modal-label" id="editUserModalLabel">{{__('users.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_username">{{__('session.data_username')}}</label>
                <input id="data_username" name="data_username" class="form-control" placeholder="{{__('session.ph_username')}}"/>
                <div id="validation_data_username" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>

            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_mail">{{__('session.data_mail')}}</label>
                <input id="data_mail" name="data_mail" class="form-control" placeholder="{{__('session.ph_mail')}}"/>
                <div id="validation_data_email" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
                <div id="validation_format_email" class="invalid-feedback">{{__('admin.email_format_error')}}</div>

                <input id="data_mail_confirm" name="data_mail_confirm" class="form-control my-2" placeholder="{{__('session.ph_mail_confirm')}}"/>
                <div id="validation_data_email2" class="invalid-feedback">{{__('admin.obligatory_field_confirm')}}</div>
                <div id="validation_format_email2" class="invalid-feedback">{{__('admin.email_format_error')}}</div>
                <div id="validation_same_email" class="invalid-feedback my-2">{{__('admin.email_compare_error')}}</div>
            </div>
            <div class="form-group py-2 edit-field">
                <button class="btn btn-dark w-100" onclick="resetPassword()">{{__('users.btn_new_password')}}</button>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto create-form-btn" id="create_user_btn" onclick="saveUser()">{{__('admin.btn_create')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto edit-form-btn" id="update_user_btn" onclick="saveUser()">{{__('admin.btn_edit')}}</buttton>
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
            <input type="hidden" id="delete_data_user_id">
            <p>{{__('users.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" onclick="deleteUser()">{{__('admin.btn_delete')}}</button>
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
    //alert('actual page:' + paginaActual + 'page:'+page);
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

function openModal_user(id, name, email){
    resetValidations();
    if(!id){
        $('#editUserModal').addClass('create-form');
        $('#editUserModal').removeClass('edit-form');

        document.getElementById("data_id").value = '';
        document.getElementById("data_username").value = '';
        document.getElementById("data_mail").value = '';
        document.getElementById("data_temp_mail").value = '';
        document.getElementById("data_mail_confirm").value = '';
    };
    if(id){
        $('#editUserModal').removeClass('create-form');
        $('#editUserModal').addClass('edit-form');

        document.getElementById("data_id").value = id;
        document.getElementById("data_username").value = name;
        document.getElementById("data_mail").value = email;
        document.getElementById("data_temp_mail").value = email;
        document.getElementById("data_mail_confirm").value = '';
    };
}

function saveUser(){
    resetValidations();

    let datos = new FormData();
    let token = document.getElementsByName("_token")[0].value;
    datos.append('_token', token);
    let data_id = document.getElementById("data_id").value;
    datos.append('id', data_id);
    let data_name = document.getElementById("data_username").value;
    datos.append('name', data_name);
    let data_new_email = document.getElementById("data_mail").value;
    let data_og_email = document.getElementById("data_temp_mail").value;
    let confirm_email = document.getElementById("data_mail_confirm").value;
    datos.append('email', data_new_email);

    let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    let isValidEmail = emailRegex.test(data_new_email);
    let isValidEmail2 = emailRegex.test(confirm_email);

    let isConfirmedEmail = false;
    let needsConfirmedEmail = true;


    if(data_id && data_new_email === data_og_email){
        isConfirmedEmail = true;
        needsConfirmedEmail = false;
        //does not need to confirm email
    }
    if(data_new_email === confirm_email){
        isConfirmedEmail = true;
        needsConfirmedEmail = false;
    }

    if(data_name && data_new_email && isValidEmail && isConfirmedEmail && !needsConfirmedEmail){

        $.ajax({
            type: 'POST',
            url: '/admin/users/store',
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){},
            success: function(msg){
                let e = JSON.parse(msg);
                if (e.status===400) {
                    alert("Error: " + msg.message);
                }
                else if(e.status===401){
                        alert("Error: " + e.message);
                        window.location = '/login';
                    }
                else {
                    closeModal('editUserModal')
                    let message = '';
                    if(data_id){
                        //alert('{{trans('users.edit_success')}}');
                        message = ('{{trans('users.edit_success')}}');
                    }
                    else{
                        //alert('{{trans('users.create_success')}}');
                        message = ('{{trans('users.create_success')}}');
                    }
                    localStorage.setItem('usersMessage', message);
                }
            },
            complete: function(){                    
                window.location = '/admin/users?page=1';           
            }
        });

    }else{
        if(!data_name){
            document.getElementById("validation_data_username").style.display = 'block';
        }
        if(!data_new_email){
            document.getElementById("validation_data_email").style.display = 'block';
        }
        if(!confirm_email){
            document.getElementById("validation_data_email2").style.display = 'block';
        }
        if(data_new_email && !isValidEmail){
            document.getElementById("validation_format_email").style.display = 'block';
        }
        if(confirm_email && !isValidEmail2){
            document.getElementById("validation_format_email2").style.display = 'block';
        }
        if(data_new_email != confirm_email){
            document.getElementById("validation_same_email").style.display = 'block';
        }
    };
}

function resetValidations(){
    document.getElementById("validation_data_username").style.display = 'none';
    document.getElementById("validation_data_email").style.display = 'none';
    document.getElementById("validation_data_email2").style.display = 'none';
    document.getElementById("validation_format_email").style.display = 'none';
    document.getElementById("validation_format_email2").style.display = 'none';
    document.getElementById("validation_same_email").style.display = 'none';
}

function openDeleteModal_user(id){
    document.getElementById("delete_data_user_id").value = id;
}
function deleteUser(){
    let tot  = <?php echo $tot?>;
    let datos = new FormData();
    let token = document.getElementsByName("_token")[0].value;
    datos.append('_token', token);
    let data_id = document.getElementById("delete_data_user_id").value;
    datos.append('id', data_id);
    if(data_id && tot>=1){
        $.ajax({
            type: 'POST',
            url: '/admin/users/delete',
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){},
            success: function(msg){

                let e = JSON.parse(msg);

                closeModal('deleteUserModal');
                if (e.status===400) {
                    alert("Error: " + msg.message);
                }
                else if(e.status===401){
                        alert("Error: " + e.message);
                        window.location = '/login';
                    }
                else {
                    //alert('{{trans('users.delete_success')}}');
                    localStorage.setItem('usersMessage', '{{trans('users.delete_success')}}');

                }
            },
            complete: function(){                    
                window.location = '/admin/users?page=1';           
            }
        });
    }
    else{
        alert('{{trans('users.more_users_required')}}')
    }
}

function resetPassword(){
    let datos = new FormData();
    let token = document.getElementsByName("_token")[0].value;
    data_email = document.getElementById("data_mail").value;
    datos.append('_token', token);
    datos.append('data_mail', data_email);
    if(data_email){
        $.ajax({
            type: 'POST',
            url: '/account/reset_password',
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){},
            success: function(msg){
                closeModal('editUserModal');
                if (msg.status===400 || msg.status===401) {
                    alert("Error: " + msg.message);
                }
                else {
                    localStorage.setItem('usersMessage', '{{trans('users.reset_password_email_sent')}}');
                }
            },
            complete: function(){
                window.location = '/admin/users?page=1';
            }
        });
    }

}

</script>

<script>

    <?php if (session()->has('error')){?>
        let message = localStorage.getItem('usersMessageError');

        if(message){
            localStorage.removeItem('usersMessageError');
            document.getElementById('alertMessageAlert').innerHTML = message;
            document.getElementById('alertMessageAlert').style.display = 'block';
            setTimeout(() => {
                document.getElementById('alertMessageAlert').style.display = 'none';
            },5000);
        };

    <?php }else{?>
        let message = localStorage.getItem('usersMessage');
        if(message){
                localStorage.removeItem('usersMessage');
                document.getElementById('alertMessage').innerHTML = message;
                document.getElementById('alertMessage').style.display = 'block';
                console.log(message);
                setTimeout(() => {
                    console.log("Delayed for 1 second.");
                    document.getElementById('alertMessage').style.display = 'none';
                },5000);
        };
    <?php }?>

    $("#search_box").keypress(function (e) {
        var key = e.which;
        if(key == 13)  // the enter key code
        {
            e.preventDefault();
            let keyword = $("#search_box").val();

            if(keyword){
                document.getElementById("page").value = 1;
                $('#searchForm_user').submit();
            }
            else{
                window.location = '../../admin/users?page=1';
            };
        };
    });

</script>

@endsection

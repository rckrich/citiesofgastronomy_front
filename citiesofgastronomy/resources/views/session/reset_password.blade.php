<!-- resources/views/session/reset_password.blade.php -->

@extends('commons.sessions_base')

@section('content')
<section id="reset_password" class="bg-white min-h-100 row mx-0">
    <div class="p-lg-5 p-md-5 p-sm-3 p-3 align-self-center">
        <div class="container-sm card bg-dark p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="p-lg-5 p-md-5 p-sm-3 p-3 col-10 mx-auto">
                <div>
                    <h3 class="text-center subtitle-md text-orange-light py-2"><b>{{__('session.forgot')}}</b></h3>
                    <p class="text-left data text-white py-2">{{__('session.forgot_desc')}}</p>
                </div>
                <form>
                @csrf
                <div class="form-group py-5">
                    <label for="data_mail" class="text-white text-left py-2">{{__('session.data_email')}}</label>                
                    <input id="data_mail" type="text" class="w-100" placeholder="{{__('session.data_email_sample')}}"/>
                    <div id="validation_data_email" class="invalid-feedback text-orange">{{__('admin.obligatory_field')}}</div>
                    <div id="validation_format_email" class="invalid-feedback text-orange">{{__('admin.email_format_error')}}</div>
                </div>
                <div class="text-center">
                    <a class="btn btn-primary inverted mx-3"  href="{{route('admin.login')}}">{{__('session.btn_cancel')}}</a>
                    <span class="btn btn-primary mx-3" onclick="resetPassword()">{{__('session.btn_reset')}}</span>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
function resetPassword(){
    document.getElementById("validation_data_email").style.display = 'none';
    document.getElementById("validation_format_email").style.display = 'none';

    let datos = new FormData();
    let token = document.getElementsByName("_token")[0].value;
    data_email = document.getElementById("data_mail").value;
    datos.append('_token', token);
    datos.append('data_mail', data_email);

    let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    let isValidEmail = emailRegex.test(data_email);

    if(data_email && isValidEmail){
        $.ajax({
            type: 'POST',
            url: '/account/reset_password',
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){},
            success: function(msg){                    
                //closeModal('deleteUserModal');
                if (msg.status===400) {
                    alert("Error: " + msg.message);
                } 
                else {
                    alert('{{trans('users.recover_password_email_sent')}}');
                    window.location = '/login';
                }
            }
        });
    }
    else{
        if(!data_email){
            document.getElementById("validation_data_email").style.display = 'block';
        }
        if(data_email && !isValidEmail){
            document.getElementById("validation_format_email").style.display = 'block';
        }
    }

}
</script>
@endsection
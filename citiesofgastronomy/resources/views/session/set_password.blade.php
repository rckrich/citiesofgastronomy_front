<!-- resources/views/session/reset_password.blade.php -->

@extends('commons.sessions_base')

@section('content')
<section id="set_password" class="bg-white min-h-100 row mx-0">
    <div class="p-lg-5 p-md-5 p-sm-3 p-3 align-self-center">
        <div class="container-sm card bg-dark p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="p-lg-5 p-md-5 p-sm-3 p-3 col-10 mx-auto">
                <div>
                    <h3 class="text-center subtitle-md text-orange-light py-2"><b>{{__('session.set_password')}}</b></h3>
                    <p class="text-left data text-white py-2">{{__('session.setPassword_desc')}}</p>
                </div>
                <form>
                @csrf
                <!--div class="form-group py-1">
                    <label for="data_mail" class="text-white text-left py-2">{{__('session.data_email')}}</label>                
                    <input id="data_mail" type="text" class="w-100" placeholder="{{__('session.data_email_sample')}}"/>
                    <div id="validation_data_email" class="invalid-feedback text-orange">{{__('admin.obligatory_field')}}</div>
                    <div id="validation_format_email" class="invalid-feedback text-orange">{{__('admin.email_format_error')}}</div>
                </div-->
                <div class="form-group py-1">
                    <label for="data_password" class="text-white text-left py-2">{{__('session.data_password')}}</label>                
                    <input id="data_password" type="password" class="w-100" placeholder="{{__('session.ph_data_password')}}"/>
                    <div id="validation_data_password" class="invalid-feedback text-orange">{{__('admin.obligatory_field')}}</div>
                    <div id="validation_format_password" class="invalid-feedback text-orange">{{__('admin.password_format_error')}}</div>
                </div>
                <div class="form-group pt-1">
                    <label for="confirm_password" class="text-white text-left py-2">{{__('session.confirm_password')}}</label>                
                    <input id="confirm_password" type="password" class="w-100" placeholder="{{__('session.ph_confirm_password')}}"/>
                    <div id="validation_confirm_password" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
                    <div id="validation_format_confirm_password" class="invalid-feedback text-orange">{{__('admin.password_format_error')}}</div>
                    <div id="validation_same_password" class="invalid-feedback text-orange my-2">{{__('admin.password_compare_error')}}</div>
                </div>
                <div class="text-center pt-4">
                    <span class="btn btn-primary mx-3" onclick="setPassword()">{{__('session.btn_set_password')}}</span>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    var access_token =  '<?php echo $token;?>';

function setPassword(){
    resetValidations();
    let datos = new FormData();
    let form_token = document.getElementsByName("_token")[0].value;
    //let data_email = document.getElementById("data_mail").value;
    let data_password = document.getElementById("data_password").value;
    let confirm_password = document.getElementById("confirm_password").value;
    datos.append('_token', form_token);
    //datos.append('data_email', data_email);
    datos.append('data_password', data_password);
    datos.append('confirm_password', confirm_password);
    datos.append('access_token', access_token);

    //let emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //let isValidEmail = emailRegex.test(data_email);
    let isValidPassword = (data_password.length >= 8 ? true : false);
    let isValidConfirmPassword = (confirm_password.length >= 8 ? true : false);
    
    let isConfirmedPassword = false;
    let needsConfirmedPassword = true;

    if(data_password === confirm_password){
        isConfirmedPassword = true;
        needsConfirmedPassword = false;
    }

    //data_email && isValidEmail 
    if(data_password && isValidPassword 
    && isConfirmedPassword && !needsConfirmedPassword
    ){
        resetValidations();
        $.ajax({
            type: 'POST',
            url: '/set_password',
            data: datos,
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){},
            success: function(msg){                    
                if (msg.status===400) {
                    alert("Error: " + msg.message);
                } 
                else {
                    alert('{{trans('session.password_set_success')}}');
                    window.location = '/login';
                }
            }
        });
    }
    else{
        /*if(!data_email){
            document.getElementById("validation_data_email").style.display = 'block';
        }
        if(data_email && !isValidEmail){
            document.getElementById("validation_format_email").style.display = 'block';
        }*/
        if(!data_password){
            document.getElementById("validation_data_password").style.display = 'block';
        }
        if(data_password && !isValidPassword){
            document.getElementById("validation_format_password").style.display = 'block';
        }
        if(!confirm_password){
            document.getElementById("validation_confirm_password").style.display = 'block';
        }
        if(confirm_password && !isValidConfirmPassword){
            document.getElementById("validation_format_confirm_password").style.display = 'block';
        }
        if(confirm_password && data_password != confirm_password){
            document.getElementById("validation_same_password").style.display = 'block';
        }
    }

}
function resetValidations(){
    //document.getElementById("validation_data_email").style.display = 'none';
    //document.getElementById("validation_format_email").style.display = 'none';
    document.getElementById("validation_data_password").style.display = 'none';
    document.getElementById("validation_format_password").style.display = 'none';
    document.getElementById("validation_confirm_password").style.display = 'none';
    document.getElementById("validation_format_confirm_password").style.display = 'none';
    document.getElementById("validation_same_password").style.display = 'none';
}
</script>
@endsection
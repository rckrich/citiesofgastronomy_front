<!-- resources/views/session/login.blade.php -->

@extends('commons.sessions_base')

@section('content')
    <section id="login" class="bg-white min-h-100 row mx-0">
        <div class="p-lg-5 p-md-5 p-sm-3 p-3 align-self-center">
            <div class="container-sm card bg-dark p-lg-5 p-md-5 p-sm-3 p-3">
                <div class="p-lg-5 p-md-5 p-sm-3 p-3 col-10 mx-auto">
                    <div class="text-center">
                        <img  id="navbarLogo" class="mb-5" src="{{asset('assets/img/logo.png')}}" alt="Logo"/>
                    </div>
                    <form id=loginForm>
                    @csrf
                        <div class="form-group py-2">
                            <label for="data_user" class="text-white text-left py-2">{{__('session.data_user')}}</label>
                            <input id="data_user" name="data_user" type="text" class="w-100" placeholder="{{__('session.data_name')}}"/>
                            <div id="data_user_validation" class="invalid-feedback text-orange" style="display: none;">{{__('admin.obligatory_field')}}</div>
                        </div>
                        <div class="form-group py-2">
                            <label for="data_password" class="text-white text-left py-2">{{__('session.data_password')}}</label>
                            <input id="data_password" name="data_password" type="password" class="w-100" placeholder="{{__('session.data_password')}}"/>
                            <div id="data_password_validation" class="invalid-feedback text-orange" style="display: none;">{{__('admin.obligatory_field')}}</div>
                        </div>
                        <div class="text-right text-white py-4">
                            <a class="text-orange-light nav-link-sm" href="{{route('admin.reset_password')}}"><b>{{__('session.forgot')}}</b></a>
                        </div>
                        <div class="text-center">
                            <!--<a  class="btn btn-primary" href="{{route('admin.index')}}">{{__('session.btn_sign')}}</a>-->
                            <button class="btn btn-primary" >{{__('session.btn_sign')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script>
        /*
        $("#loginForm").on('submit', function(e){
            e.preventDefault();

        });//*/
        //function doLogin(){
        $("#loginForm").on('submit', function(e){
            e.preventDefault();
            let data_user = document.getElementById("data_user").value;
            let data_password = document.getElementById("data_password").value;
            //document.getElementById("btnSubmit").disabled = true;

            if(data_user==''){
                document.getElementById("data_user").className =  'form-control is-invalid';
                document.getElementById("data_user_validation").style.display =  'block';
            };

            if(data_password==''){
                document.getElementById("data_password").className =  'form-control is-invalid';
                document.getElementById("data_password_validation").style.display =  'block';
            };

            if(data_user!=''&&data_password!=''){
                let token =  document.getElementsByName("_token")[0].value;

                let datos = new FormData(this);
                datos.append('data_user', data_user);
                datos.append('data_password', data_password);
                datos.append('_token', token);
                //datos = [];
                //datos["data_user"] = data_user;
                //datos["data_password"] = data_password;

                $.ajax({
                    type: 'POST',
                    url: '/doLogin',
                    data: datos,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        //$('.submitBtn').attr("disabled","disabled");
                        //$('#fupForm').css("opacity",".5");
                    },
                    success: function(msg){
                        //let e = JSON.parse(msg);
                        if(msg.status=='200'){
                            //alert("200");
                            window.location ='/admin/cities';
                        }else{
                            alert(msg.message);
                            //alert("401");
                        };
                        //document.getElementById("btnSubmit").disabled = false;
                    }
                });
            };
        });
    </script>
@endsection

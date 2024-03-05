<!-- resources/views/tastier_life/new_chef.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_chef_new">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    @if($id)
                    <h3 class="admin-title"><b>{{__('tastier_life.chefs.edit.title')}}</b></h3>
                    @else
                    <h3 class="admin-title"><b>{{__('tastier_life.chefs.create.title')}}</b></h3>
                    @endif
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3" action="/admin/tastier_life/chef/store" method="POST" id="newChef_Form">
                    @csrf
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tastier_life.chefs.create.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control" placeholder="{{__('tastier_life.chefs.create.ph_name')}}"/>
                    </div>
                    <div class="col-12 px-0 my-2">
                        <p class="admin-subtitle"><b>{{__('tastier_life.chefs.create.section_socials')}}</b></p>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="facebook_link">{{__('tastier_life.chefs.create.data_facebook')}}</label>
                        <input id="facebook_link" name="facebook_link" class="form-control" placeholder="{{__('tastier_life.chefs.create.ph_facebook')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="twitter_link">{{__('tastier_life.chefs.create.data_twitter')}}</label>
                        <input id="twitter_link" name="twitter_link" class="form-control" placeholder="{{__('tastier_life.chefs.create.ph_twitter')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="linkedin_link">{{__('tastier_life.chefs.create.data_linkedin')}}</label>
                        <input id="linkedin_link" name="linkedin_link" class="form-control" placeholder="{{__('tastier_life.chefs.create.ph_linkedin')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="instagram_link">{{__('tastier_life.chefs.create.data_instagram')}}</label>
                        <input id="instagram_link" name="instagram_link" class="form-control" placeholder="{{__('tastier_life.chefs.create.ph_instagram')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="tiktok_link">{{__('tastier_life.chefs.create.data_tiktok')}}</label>
                        <input id="tiktok_link" name="tiktok_link" class="form-control" placeholder="{{__('tastier_life.chefs.create.ph_tiktok')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="youtube_link">{{__('tastier_life.chefs.create.data_youtube')}}</label>
                        <input id="youtube_link" name="youtube_link" class="form-control" placeholder="{{__('tastier_life.chefs.create.ph_youtube')}}"/>
                    </div>
                    <div class="row form-group py-5">
                        <div class="col-auto ms-auto"><a href="{{route('admin.tastier_life')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        
                        <div class="col-auto me-auto">
                            @if($id)
                            <button class="btn btn-primary w-100" onclick="saveChef()">{{__('admin.btn_edit')}}</button>
                            @else
                            <button class="btn btn-primary w-100" onclick="saveChef()">{{__('admin.btn_create')}}</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


    <script>
        function saveChef(){
            console.log("#1");

            let data_name = document.getElementById("data_name").value;
            let data_position = document.getElementById("data_position").value;
            let data_city = document.getElementById("data_city").value;

            document.getElementById("validation_name").style.display = 'none';
            document.getElementById("validation_city").style.display = 'none';
            document.getElementById("validation_position").style.display = 'none';

            if(data_name && data_position && data_city){
                console.log("#2");
                //
                <?php if($id){?>
                localStorage.setItem('contactMessage', 'The contact info was successfully edited');
                <?php }else{?>
                localStorage.setItem('contactMessage', 'The contact info was successfully created');
                <?php };?>
                let form = document.getElementById('contactForm');
                form.submit();

            }else{
                if(!data_name){document.getElementById("validation_name").style.display = 'block';};
                if(!data_city){document.getElementById("validation_city").style.display = 'block';};
                if(!data_position){document.getElementById("validation_position").style.display = 'block';};
            };
        }
        const $elementos = document.querySelectorAll(".prevenir-envio");

    $elementos.forEach(elemento => {
        elemento.addEventListener("keydown", (evento) => {
            if (evento.key == "Enter") {
                // Prevenir
                evento.preventDefault();
                let id1 = evento.target.id;
                if(evento.target.id == 'search_box'){
                    searchBox('time');
                }else{
                    searchBox('faq');
                }
                console.log('resultado: '+ evento.target.id);
                return false;
            }
        });
    });
    </script>
@endsection
<!-- resources/views/contact/new.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_contact_new">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    @if($id)
                    <h3 class="admin-title"><b>{{__('contact.edit.title')}}</b></h3>
                    @else
                    <h3 class="admin-title"><b>{{__('contact.create.title')}}</b></h3>
                    @endif
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3" action="/admin/contact/save" method="POST" id="contactForm">
                    @csrf

                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('contact.create.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control prevenir-envio"
                        placeholder="{{__('contact.create.ph_name')}}" value="{{$contact['name'] }}"/>
                        <div id="validation_name" class="invalid-feedback">Obligatory field</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_position">{{__('contact.create.data_position')}}</label>
                        <input id="data_position" name="data_position" class="form-control prevenir-envio"
                                placeholder="{{__('contact.create.ph_position')}}" value="{{$contact['position'] }}"/>
                        <div id="validation_position" class="invalid-feedback">Obligatory field</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_city">{{__('contact.create.data_city')}}</label>
                        <!--<input id="data_city" name="data_city" class="form-control" placeholder="{{__('contact.create.ph_city')}}"/>-->
                        <select id="data_city" name="data_city" class="form-control">
                                <option value="" >Select a city</option>
                                @foreach($cities as $city)
                                <option value="{{ $city['id'] }}" <?php if($contact["idCity"] == $city['id']){echo 'selected';}
                                ?>>{{ $city["name"] }}</option>
                                @endforeach
                        </select>
                        <div id="validation_city" class="invalid-feedback">Obligatory field</div>
                    </div>
                    <?php $linksTag = '';?>
                        @for($i=1; $i < count($SocialNetworkType)+1; $i++)
                        <?php   $s = $i-1;
                                if($i!=1){$linksTag = $linksTag . ',';}
                                $linksTag = $linksTag . $SocialNetworkType[$s]['codde'];
                                //'contactSocialNetwork' => $objsocialContact
                                $socialValue='';
                                if(count($contactSocialNetwork) >0){
                                    $found_key = array_search($SocialNetworkType[$s]['id'], array_column($contactSocialNetwork, 'id'));
                                    if($found_key){
                                        $socialValue =$contactSocialNetwork[$found_key]["value"];
                                    };
                                }
                        ?>
                        <div class="form-group py-2">
                            <label class="form-label" for="<?= $SocialNetworkType[$s]['codde']?>_link">
                                    <?= $SocialNetworkType[$s]['name']?>:
                            </label>
                            <input id="<?= $SocialNetworkType[$s]['codde']?>_link" name="<?= $SocialNetworkType[$s]['codde']?>_link"
                                            class="form-control socialLinks prevenir-envio"  value="<?= $socialValue?>"
                                            placeholder="{{__('admin.main_site.socials.ph')}}"/>
                        </div>
                        @endfor

                        <div class="row form-group py-5">
                            <div class="col-auto ms-auto">
                                <a href="{{route('admin.contact')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a>
                            </div>
                            <div class="col-auto me-auto">
                                @if($id)
                                <span class="btn btn-primary w-100" onclick="saveContact()">{{__('admin.btn_edit')}}</span>
                                @else
                                <span class="btn btn-primary w-100" onclick="saveContact()">{{__('admin.btn_create')}}</span>
                                @endif
                            </div>
                        </div>

                        <!--<input id="facebook_link" name="facebook_link" class="form-control" placeholder="{{__('contact.create.ph_facebook')}}"/>-->
                        <input type="hidden" id="id" name="id" value="<?= $id?>">
                        <input type="hidden" id="idSection" name="idSection" value="11">
                        <input type="hidden" id="linksTag" name="linksTag" value="<?= $linksTag?>">

                </form>
            </div>
        </div>
    </section>

    <script>
        function saveContact(){
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

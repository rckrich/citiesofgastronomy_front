<!-- resources/views/contact/new.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_contact_new">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('contact.create.title')}}</b></h3>
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3" action="/admin/contact/save" method="POST">
                    @csrf

                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('contact.create.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control" placeholder="{{__('contact.create.ph_name')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_position">{{__('contact.create.data_position')}}</label>
                        <input id="data_position" name="data_position" class="form-control" placeholder="{{__('contact.create.ph_position')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_city">{{__('contact.create.data_city')}}</label>
                        <!--<input id="data_city" name="data_city" class="form-control" placeholder="{{__('contact.create.ph_city')}}"/>-->
                        <select id="data_city" name="data_city" class="form-control">
                                @foreach($cities as $city)
                                <option value="{{ $city['id'] }}" >{{ $city["name"] }}</option>
                                @endforeach
                        </select>
                        <div id="validation_city" class="invalid-feedback">Obligatory field</div>
                    </div>
                    <?php $linksTag = '';?>
                        @for($i=1; $i < count($SocialNetworkType)+1; $i++)
                        <?php   $s = $i-1;
                                if($i!=1){$linksTag = $linksTag . ',';}
                                $linksTag = $linksTag . $SocialNetworkType[$s]['codde'];
                        ?>
                        <div class="form-group py-2">
                            <label class="form-label" for="<?= $SocialNetworkType[$s]['codde']?>_link">
                                    <?= $SocialNetworkType[$s]['name']?>:
                            </label>
                            <input id="<?= $SocialNetworkType[$s]['codde']?>_link" name="<?= $SocialNetworkType[$s]['codde']?>_link"
                                            class="form-control socialLinks"  value=""
                                            placeholder="{{__('admin.main_site.socials.ph')}}"/>
                        </div>
                        @endfor

                        <!--<input id="facebook_link" name="facebook_link" class="form-control" placeholder="{{__('contact.create.ph_facebook')}}"/>-->
                        <input type="hidden" id="idOwner" name="idOwner" value="">
                        <input type="hidden" id="idSection" name="idSection" value="11">
                        <input type="hidden" id="linksTag" name="linksTag" value="<?= $linksTag?>">

                </form>
            </div>
        </div>
    </section>

    <script>
        function saveContact(){
            console.log("#1");
            let objSocialLinks = document.getElementsByClassName("socialLinks");
            let idOwner = document.getElementById("idOwner").value;
            let idSection = document.getElementById("idSection").value;
            let linksTag = document.getElementById("linksTag").value;

            let data_name = document.getElementById("data_name").value;
            let data_position = document.getElementById("data_position").value;
            let data_city = document.getElementById("data_city").value;

            if(objSocialLinks.length >0){
                console.log("#2");
                    let token = document.getElementsByName("_token")[0].value;
                    let datos = new FormData();
                    let linkValue = ''; let linkName = '';
                    datos.append('_token', token);
                    datos.append('idOwner', idOwner);
                    datos.append('idSection', idSection);
                    datos.append('linksTag', linksTag);

                    datos.append('data_name', data_name);
                    datos.append('data_position', data_position);
                    datos.append('data_city', data_city);

                    for(let i = 0 ; i < objSocialLinks.length; i ++){
                        linkValue = objSocialLinks[i].value;
                        linkName = objSocialLinks[i].name;
                        datos.append(linkName, linkValue);
                    }

                    $.ajax({
                                    type: 'POST',
                                    url: '/admin/contact/save',
                                    data: datos,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend: function(){
                                        $('.submitBtn').attr("disabled","disabled");
                                        //$('#fupForm').css("opacity",".5");
                                    },
                                    success: function(msg){
                                        //localStorage.setItem('message', 'Links was successfully saved');
                                        //window.location ='/admin/cities/';
                                        alert("Links was successfully saved");
                                        //document.getElementById("btnSubmit").disabled = false;
                                    }
                    });
                    //*/
                };
        }
    </script>
@endsection

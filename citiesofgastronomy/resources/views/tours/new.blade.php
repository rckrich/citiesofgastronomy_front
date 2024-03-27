<!-- resources/views/tours/new.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_tours_new">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('tours.data.title')}}</b></h3>
                </div>
            </div>
            
            <div class="row mx-0">
                <form class="pb-5 my-3" action="/admin/tours/store" method="POST" id="tourForm">
                @csrf
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tours.data.data_name')}}</label>
                        <input id="data_name" name="data_name" value="{{$name}}" class="form-control" placeholder="{{__('tours.data.ph_name')}}"/>
                        <div id="data_name_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tours.data.data_photo')}}</label>
                        <!--img obligatoria, si no existe imagen aún (solo aplica aquí)-->
                        <div class="my-3 w-25" id="phototbl" <?php  if(!$photo){echo 'style="display:none"';}?> >
                            <!--<div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/></div>-->
                            <img class="gallery-img w-100" src="<?php if($photo){echo config('app.url').$photo;}?>" id="imgFile"/>
                        </div>
                        <div class="p-2">
                            <label class="custom-file-upload btn btn-primary position-relative" for="initiative_photo">
                                <input type="file" class="inputImage" name="photo" id="photo"
                                        onChange="sel_file('imgFile', 'photo', 'phototbl', 'block')">
                                {{$photo!=''?__('admin.btn_change_image'):__('admin.btn_add_image')}}
                            </label>
                        </div>
                        <div id="photo_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_agency">{{__('tours.data.data_agency')}}</label>
                        <input id="data_agency" name="data_agency" value="{{$agency}}" class="form-control" placeholder="{{__('tours.data.ph_agency')}}"/>
                        <div id="data_agency_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_city">{{__('tours.data.data_city')}}</label>
                        <select id="data_city" name="data_city" class="form-control" placeholder="">
                            <option <?php if($selectedCity=='default'){echo 'selected';}?> 
                                value="default">{{__('tastier_life.recipes.ph_city')}}
                            </option>
                            @foreach($citiesList as $city)
                            <option id="filter-{{$city['id']}}" name="filter-{{$city['id']}}" 
                                <?php if($selectedCity==$city['id']){echo 'selected';}?> 
                                value="{{$city['id']}}">{{$city['name']}}
                            </option>
                            @endforeach
                        </select>
                        <div id="data_city_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('tours.data.data_description')}}</label>
                        <textarea id="data_description" name="data_description" class="form-control" placeholder="{{__('tours.data.ph_description')}}">
                            {{$description}}
                        </textarea>
                        <div id="data_description_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>
                    
                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="row mx-0 py-2">
                        <div class="col-12 px-0 my-2">
                            <p class="section-title"><b>{{__('tours.data.section_socials')}}</b></p>
                        </div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="facebook_link">{{__('tastier_life.chefs.data_facebook')}}</label>
                        <input type="url" id="facebook_link" name="facebook_link" class="form-control" value="<?= $facebook_link?>" placeholder="{{__('tastier_life.chefs.ph_facebook')}}"/>
                        <div id="validation_facebook" class="invalid-feedback">{{__('admin.url_format_error')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="twitter_link">{{__('tastier_life.chefs.data_twitter')}}</label>
                        <input type="url" id="twitter_link" name="twitter_link" class="form-control" value="<?= $twitter_link?>" placeholder="{{__('tastier_life.chefs.ph_twitter')}}"/>
                        <div id="validation_twitter" class="invalid-feedback">{{__('admin.url_format_error')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="linkedin_link">{{__('tastier_life.chefs.data_linkedin')}}</label>
                        <input type="url" id="linkedin_link" name="linkedin_link" class="form-control" value="<?= $linkedin_link?>" placeholder="{{__('tastier_life.chefs.ph_linkedin')}}"/>
                        <div id="validation_linkedin" class="invalid-feedback">{{__('admin.url_format_error')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="instagram_link">{{__('tastier_life.chefs.data_instagram')}}</label>
                        <input type="url" id="instagram_link" name="instagram_link" class="form-control" value="<?= $instagram_link?>" placeholder="{{__('tastier_life.chefs.ph_instagram')}}"/>
                        <div id="validation_instagram" class="invalid-feedback">{{__('admin.url_format_error')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="tiktok_link">{{__('tastier_life.chefs.data_tiktok')}}</label>
                        <input type="url" id="tiktok_link" name="tiktok_link" class="form-control" value="<?= $tiktok_link?>" placeholder="{{__('tastier_life.chefs.ph_tiktok')}}"/>
                        <div id="validation_tiktok" class="invalid-feedback">{{__('admin.url_format_error')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="youtube_link">{{__('tastier_life.chefs.data_youtube')}}</label>
                        <input type="url" id="youtube_link" name="youtube_link" class="form-control" value="<?= $youtube_link?>" placeholder="{{__('tastier_life.chefs.ph_youtube')}}"/>
                        <div id="validation_youtube" class="invalid-feedback">{{__('admin.url_format_error')}}</div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group row py-2">
                        <p class="form-label"><b>{{__('tours.data.section_gallery')}}</b></p>
                        <div class="row py-2" id="galleryTBL">
                            @if($gallery)
                            @for($i=1; $i < count($gallery)+1; $i++)
                            <?php $s = $i - 1?>
                            <div class="col-2 py-2 mx-2" id="imageTBL<?= $i?>">
                                <div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"
                                        onclick="deletefuncion('<?= $i?>', 'imageTBL', 'deleteImage')"/></div>
                                <img class="gallery-img w-100" src="{{config('app.url').$gallery[$s]['image']}}"/>
                                <input type="hidden" id="idImage<?= $i?>" name="idImage<?= $i?>" value="{{$gallery[$s]['id']}}">
                                <input type="hidden" id="deleteImage<?= $i?>" name="deleteImage<?= $i?>">
                            </div>
                            @endfor
                            <input type="hidden" id="cant_gallery" name="cant_gallery" value="<?= $i?>">
                            @else
                            <input type="hidden" id="cant_gallery" name="cant_gallery" value="0">
                            @endif


                            @if($gallery)
                            <?php $e = count($gallery)+1;?>
                            @else
                            <?php $e = 1;?>
                            @endif

                            <div class="col-2 py-2 mx-2 row text-center" id="imageTBL<?= $e?>" style="display:block">
                                <div class="text-right" id="deleteIcon<?= $e?>" style="display:none">
                                        <img class="delete-img" src="{{asset('assets/icons/delete.png')}}"
                                        onclick="deletefuncion('<?= $e?>', 'imageTBL', 'deleteImage')"/>
                                </div>
                                <img class="gallery-img w-100" id="thumbImage<?= $e?>" style="display:none"/>
                                <div class="col-12 p-2 load-img h-100 row mx-0 align-items-center position-relative" id="plusIMG<?= $e?>">
                                    <input type="file" class="inputImage" name="image<?= $e?>" id="image<?= $e?>"
                                            onChange="imageSelection('<?= $e?>')" style="width:100%;      height: 100%;">
                                    <label class="custom-file-upload" for="new_gallery_img">
                                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                                    </label>
                                    <input type="hidden" id="idImage<?= $e?>" name="idImage<?= $e?>">
                                    <input type="hidden" id="deleteImage<?= $e?>" name="deleteImage<?= $e?>">
                                </div>
                            </div>
                        </div>
                    </div>                         

                    <div class="row form-group py-5">
                        <div class="col-auto ms-auto"><a href="{{route('admin.tours')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button id="btnSubmit" class="btn btn-primary w-100">{{$id?__('admin.btn_edit'):__('admin.btn_create')}}</buttton></div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    
    <!-- Modal Gallery -->
    <div class="col-2 py-2 mx-2 row text-center" id="imageTBL0" style="display:none">
        <div class="text-right" id="deleteIcon0" style="display:none">
                <img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/>
        </div>
        <img class="gallery-img w-100" id="thumbImage0" style="display:none"/>
        <div class="col-12 p-2 load-img h-100 row mx-0 align-items-center position-relative" id="plusIMG0">
            <input type="file" class="inputImage" name="image0" id="image0"
                    onChange="imageSelection('0')" style="width:100%;      height: 100%;">
            <label class="custom-file-upload" for="new_gallery_img">
                <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}"
                    width="80" height="80"/>
            </label>
            <input type="hidden" id="idImage0" name="idImage0">
            <input type="hidden" id="deleteImage0" name="deleteImage0">
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script>
        var editor_data_description = CKEDITOR.replace( 'data_description' );
        $(document).ready(function(e){
            $("#file").change(function() {
                var file = this.files[0];
                var imagefile = file.type;
                var match= ["image/jpeg","image/png","image/jpg"];
                if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                    alert('Please select a valid image file (JPEG/JPG/PNG).');
                    $("#file").val('');
                    return false;
                }
            });//*/
        });

        function imageSelection(item){
            let id1 = "deleteIcon"+item ;
            document.getElementById(id1).style.display = 'block';
            id1 = 'plusIMG'+item;
            document.getElementById(id1).style.display = 'none';
            id1 = "thumbImage"+item ;
            document.getElementById(id1).style.display = 'block';
            sel_file('thumbImage'+item, 'image'+item );

            item = parseInt(item);
            let nuevovalor = item +1;

            let nuevaid = 'imageTBL'+nuevovalor;
            let clonedDiv = $('#imageTBL0').clone();
            clonedDiv.attr("id", nuevaid); // Cambio id
            $('#galleryTBL').append(clonedDiv);// lo coloco en este div

            let padre = document.getElementById(nuevaid).getElementsByTagName("input");
            padre[0].id = 'image' + nuevovalor;
            padre[0].name = 'image' + nuevovalor;
            padre[1].id = 'idImage' + nuevovalor;
            padre[1].name = 'idImage' + nuevovalor;
            padre[2].id = 'deleteImage' + nuevovalor;
            padre[2].name = 'deleteImage' + nuevovalor;
            var jss1 = "imageSelection('"+nuevovalor+"')";
            padre[0].setAttribute("onchange", jss1);

            let padre3 = document.getElementById(nuevaid).getElementsByTagName("div");
            padre3[0].id = 'deleteIcon' + nuevovalor;
            padre3[0].name = 'deleteIcon' + nuevovalor;
            padre3[1].id = 'plusIMG' + nuevovalor;
            padre3[1].name = 'plusIMG' + nuevovalor;
            var jss1 = "deletefuncion('"+nuevovalor+"', 'imageTBL', 'deleteImage')";
            padre3[0].setAttribute("onclick", jss1);

            let padre4 = document.getElementById(nuevaid).getElementsByTagName("img");
            padre4[1].id = 'thumbImage' + nuevovalor;
            padre4[1].name = 'thumbImage' + nuevovalor;

            document.getElementById(nuevaid).style.display = 'block';
            document.getElementById("cant_gallery").value = item +1;

        }

        function resetValidations(){
            document.getElementById("data_name").className =  'form-control';
            document.getElementById("data_name_validation").style.display =  'none';
            document.getElementById("photo_validation").style.display =  'none';
            document.getElementById("data_city").className =  'form-control';
            document.getElementById("data_city_validation").style.display =  'none';
            document.getElementById("data_agency").className =  'form-control';
            document.getElementById("data_agency_validation").style.display =  'none';
            document.getElementById("data_description").className =  'form-control';
            document.getElementById("data_description_validation").style.display =  'none';
            
            document.getElementById("facebook_link").className =  'form-control';
            document.getElementById("twitter_link").className =  'form-control';
            document.getElementById("linkedin_link").className =  'form-control';
            document.getElementById("instagram_link").className =  'form-control';
            document.getElementById("tiktok_link").className =  'form-control';
            document.getElementById("youtube_link").className =  'form-control';
            document.getElementById("validation_facebook").style.display = 'none';
            document.getElementById("validation_twitter").style.display = 'none';
            document.getElementById("validation_linkedin").style.display = 'none';
            document.getElementById("validation_instagram").style.display = 'none';
            document.getElementById("validation_tiktok").style.display = 'none';
            document.getElementById("validation_youtube").style.display = 'none';
        }

        $("#tourForm").on('submit', function(e){
            e.preventDefault();
            document.getElementById("btnSubmit").disabled = true;
            let id = '<?= $id?>';
            let data_name = document.getElementById("data_name").value;
            let photo = document.getElementById("photo").value;
            let data_city = document.getElementById("data_city").value;
            let data_agency = document.getElementById("data_agency").value;
            let facebook_link = document.getElementById("facebook_link").value;
            let twitter_link = document.getElementById("twitter_link").value;
            let linkedin_link = document.getElementById("linkedin_link").value;
            let instagram_link = document.getElementById("instagram_link").value;
            let tiktok_link = document.getElementById("tiktok_link").value;
            let youtube_link = document.getElementById("youtube_link").value;
            
            let data_description  = editor_data_description.getData();
                    
            let valida = 'si';let errorMessage = '';
            let is_valid_facebook = true;
            let is_valid_twitter = true;
            let is_valid_linkedin = true;
            let is_valid_instagram = true;
            let is_valid_tiktok = true;
            let is_valid_youtube = true;
            
            //reseteo validaciones
            resetValidations();

            //general DATTA
            if(data_name=='' || data_city=='default' || data_agency=='' || data_description==''
            ){
                valida = 'no';
            };

            if(photo=='' && id==''){
                valida = 'no';
            };
            
            if(facebook_link && !isValidUrl(facebook_link)){is_valid_facebook = false; valida='no'}//if empty or valid url, continues as true
            if(twitter_link && !isValidUrl(twitter_link)){is_valid_twitter = false; valida='no'}
            if(linkedin_link && !isValidUrl(linkedin_link)){is_valid_linkedin = false; valida='no'}
            if(instagram_link && !isValidUrl(instagram_link)){is_valid_instagram = false; valida='no'}
            if(tiktok_link && !isValidUrl(tiktok_link)){is_valid_tiktok = false; valida='no'}
            if(youtube_link && !isValidUrl(youtube_link)){is_valid_youtube = false; valida='no'}

            if(valida == 'si'){

                let datos = new FormData(this);
                datos.append('data_description', data_description);
                datos.append('id', id);

                $.ajax({
                    type: 'POST',
                    url: '/admin/tours/store',
                    data: datos,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        //$('.submitBtn').attr("disabled","disabled");
                        //$('#fupForm').css("opacity",".5");
                    },
                    success: function(msg){
                        console.log("::msg");
                        console.log(msg);
                        console.log(msg.message);
                        //let e = JSON.parse(msg);
                        //console.log(e.datta);
                        if(msg.status=='200'){
                            <?php if($id){?>
                                localStorage.setItem('toursMessage', "{{trans('tours.data.edit_success')}}");
                            <?php }else{?>
                                localStorage.setItem('toursMessage', "{{trans('tours.data.create_success')}}");
                            <?php };?>
                        }else{
                            localStorage.setItem('toursMessageError', 'Error:' + msg.message);
                        };
                        window.location ='/admin/tours?page=1';
                        document.getElementById("btnSubmit").disabled = false;
                    }
                });
                //*/
                //alert("Iniciative was successfully saved");

            }else{

                if(data_name=='' || (photo=='' && id=='') || data_agency=='' || data_city=='default' || data_description==''
                ){
                    errorMessage = 'Fill out all fields. ' + errorMessage  ;
                    if(data_name==''){
                        document.getElementById("data_name").className =  'form-control is-invalid';
                        document.getElementById("data_name_validation").style.display =  'block';
                    };
                    if(photo=='' && id==''){
                        //document.getElementById("photo").className =  'form-control is-invalid';
                        document.getElementById("photo_validation").style.display =  'block';
                    };
                    if(data_agency==''){
                        document.getElementById("data_agency").className =  'form-control is-invalid';
                        document.getElementById("data_agency_validation").style.display =  'block';
                    };
                    if(data_city=='default'){
                        document.getElementById("data_city").className =  'form-control is-invalid';
                        document.getElementById("data_city_validation").style.display =  'block';
                    };
                    if(data_description==''){
                        document.getElementById("data_description").className =  'form-control is-invalid';
                        document.getElementById("data_description_validation").style.display =  'block';
                    }
                };
                if(!is_valid_facebook){
                    document.getElementById("facebook_link").className =  'form-control is-invalid';
                    document.getElementById("validation_facebook").style.display = 'block';
                }
                if(!is_valid_twitter){
                    document.getElementById("twitter_link").className =  'form-control is-invalid';
                    document.getElementById("validation_twitter").style.display = 'block';
                }
                if(!is_valid_linkedin){
                    document.getElementById("linkedin_link").className =  'form-control is-invalid';
                    document.getElementById("validation_linkedin").style.display = 'block';
                }
                if(!is_valid_instagram){
                    document.getElementById("instagram_link").className =  'form-control is-invalid';
                    document.getElementById("validation_instagram").style.display = 'block';
                }
                if(!is_valid_tiktok){
                    document.getElementById("tiktok_link").className =  'form-control is-invalid';
                    document.getElementById("validation_tiktok").style.display = 'block';
                }
                if(!is_valid_youtube){
                    document.getElementById("youtube_link").className =  'form-control is-invalid';
                    document.getElementById("validation_youtube").style.display = 'block';
                }

                alert(errorMessage);
                document.getElementById("btnSubmit").disabled = false;
            };
        });

    </script>
@endsection
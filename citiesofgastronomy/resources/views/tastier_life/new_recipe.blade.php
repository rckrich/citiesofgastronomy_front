<!-- resources/views/tastier_life/new_recipe.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_recipe_new">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                @if($id)
                    <h3 class="admin-title"><b>{{__('tastier_life.recipes.edit_title')}}</b></h3>
                @else
                    <h3 class="admin-title"><b>{{__('tastier_life.recipes.create_title')}}</b></h3>
                @endif
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3" action="/admin/tastier_life/recipe/store" method="POST" id="recipeForm">
                @csrf
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tastier_life.recipes.data_name')}}</label>
                        <input id="data_name" name="data_name" value="{{$name}}" class="form-control" placeholder="{{__('tastier_life.recipes.ph_name')}}"/>
                        <div id="data_name_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="photo">{{__('tastier_life.recipes.data_photo')}}</label>
                        
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

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('tastier_life.recipes.data_description')}}</label>
                        <textarea id="data_description" name="data_description" class="form-control" placeholder="{{__('tastier_life.recipes.ph_description')}}">
                            {{$description}}
                        </textarea>
                        <div id="data_description_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>
                    
                    <div class="form-group py-2">
                        <label class="form-label" for="data_chef">{{__('tastier_life.recipes.data_chef')}}</label>
                        <select id="data_chef" name="data_chef" class="form-control" placeholder="">
                            <option <?php if($selectedChef=='default'){echo 'selected';}?> 
                                value="default">{{__('tastier_life.recipes.ph_chef')}}
                            </option>
                            @foreach($chefsList as $chef)
                            <option id="filter-{{$chef['id']}}" name="filter-{{$chef['id']}}" 
                                <?php if($selectedChef==$chef['id']){echo 'selected';}?> 
                                value="{{$chef['id']}}">{{$chef['name']}}
                            </option>
                            @endforeach
                        </select>
                        <div id="data_chef_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_city">{{__('tastier_life.recipes.data_city')}}</label>
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
                    <div class="form-group py-2">
                        <label class="form-label" for="data_cat">{{__('tastier_life.recipes.data_cat')}}</label>
                        <select id="data_cat" name="data_cat" class="form-control" placeholder="">
                            <option <?php if($selectedCat=='default'){echo 'selected';}?> 
                                value="default">{{__('tastier_life.recipes.ph_cat')}}
                            </option>
                            @foreach($categoriesList as $cat)
                            <option id="filter-{{$cat['id']}}" name="filter-{{$cat['id']}}" 
                                <?php if($selectedCat==$cat['id']){echo 'selected';}?> 
                                value="{{$cat['id']}}">{{$cat['name']}}
                            </option>
                            @endforeach
                        </select>
                        <div id="data_cat_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>
                    
                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="row mx-0 py-2">
                        <div class="col-12 px-0 my-2">
                            <p class="section-title"><b>{{__('initiatives.create.section_about')}}</b></p>
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_difficulty">{{__('tastier_life.recipes.data_difficulty')}}</label>
                        <input id="data_difficulty" name="data_difficulty" value="<?= $difficulty?>" class="form-control" placeholder="{{__('tastier_life.recipes.ph_difficulty')}}"/>
                        <div id="data_difficulty_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_preptime">{{__('tastier_life.recipes.data_preptime')}}</label>
                        <input id="data_preptime" name="data_preptime" value="<?= $prepTime?>" class="form-control" placeholder="{{__('tastier_life.recipes.ph_preptime')}}"/>
                        <div id="data_preptime_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_totaltime">{{__('tastier_life.recipes.data_totaltime')}}</label>
                        <input id="data_totaltime" name="data_totaltime" value="<?= $totalTime?>" class="form-control" placeholder="{{__('tastier_life.recipes.ph_totaltime')}}"/>
                        <div id="data_totaltime_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_servings">{{__('tastier_life.recipes.data_servings')}}</label>
                        <input id="data_servings" name="data_servings" value="<?= $servings?>" class="form-control" placeholder="{{__('tastier_life.recipes.ph_servings')}}"/>
                        <div id="data_servings_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_ingredients">{{__('tastier_life.recipes.data_ingredients')}}</label>
                        <textarea id="data_ingredients" name="data_ingredients" class="form-control" placeholder="{{__('tastier_life.recipes.ph_ingredients')}}">
                            {{$ingredients}}
                        </textarea>
                        <div id="data_ingredients_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_preparations">{{__('tastier_life.recipes.data_preparations')}}</label>
                        <textarea id="data_preparations" name="data_preparations" class="form-control" placeholder="{{__('tastier_life.recipes.ph_preparations')}}">
                            {{$preparations}}
                        </textarea>
                        <div id="data_preparations_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group row py-2">
                        <p class="form-label"><b>{{__('tastier_life.recipes.section_gallery')}}</b></p>
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
                        <div class="col-auto ms-auto"><a href="{{route('admin.tastier_life')}}?section=recipes&page=1" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
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
    var editor_data_ingredients = CKEDITOR.replace( 'data_ingredients' );
    var editor_data_preparations = CKEDITOR.replace( 'data_preparations' );

    $(document).ready(function(e){
        //file type validation
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
        padre3[0].setAttribute("onchange", jss1);

        let padre4 = document.getElementById(nuevaid).getElementsByTagName("img");
        padre4[1].id = 'thumbImage' + nuevovalor;
        padre4[1].name = 'thumbImage' + nuevovalor;

        document.getElementById(nuevaid).style.display = 'block';
        document.getElementById("cant_gallery").value = item +1;

    }

    function resetValidations(){
        document.getElementById("data_name").className =  'form-control';
        document.getElementById("data_name_validation").style.display =  'none';
        //document.getElementById("photo").className =  'form-control';
        document.getElementById("photo_validation").style.display =  'none';
        document.getElementById("data_chef").className =  'form-control';
        document.getElementById("data_chef_validation").style.display =  'none';
        document.getElementById("data_city").className =  'form-control';
        document.getElementById("data_city_validation").style.display =  'none';
        document.getElementById("data_cat").className =  'form-control';
        document.getElementById("data_cat_validation").style.display =  'none';
        document.getElementById("data_difficulty_validation").style.display =  'none';
        document.getElementById("data_preptime_validation").style.display =  'none';
        document.getElementById("data_totaltime_validation").style.display =  'none';
        document.getElementById("data_servings_validation").style.display =  'none';
        document.getElementById("data_description").className =  'form-control';
        document.getElementById("data_description_validation").style.display =  'none';
        document.getElementById("data_ingredients").className =  'form-control';
        document.getElementById("data_ingredients_validation").style.display =  'none';
        document.getElementById("data_preparations").className =  'form-control';
        document.getElementById("data_preparations_validation").style.display =  'none';
    }

    $("#recipeForm").on('submit', function(e){
        e.preventDefault();
        document.getElementById("btnSubmit").disabled = true;
        let id = '<?= $id?>';
        let data_name = document.getElementById("data_name").value;
        let photo = document.getElementById("photo").value;
        let data_chef = document.getElementById("data_chef").value;
        let data_city = document.getElementById("data_city").value;
        let data_cat = document.getElementById("data_cat").value;
        let data_difficulty = document.getElementById("data_difficulty").value;
        let data_preptime = document.getElementById("data_preptime").value;
        let data_totaltime = document.getElementById("data_totaltime").value;
        let data_servings = document.getElementById("data_servings").value;
        let data_description  = editor_data_description.getData();//document.getElementById("data_description").value;
        let data_ingredients  = editor_data_ingredients.getData();
        let data_preparations  = editor_data_preparations.getData();
                
        let valida = 'si';let errorMessage = '';
        
        //reseteo validaciones
        resetValidations();

        //general DATTA
        if(data_name=='' || data_chef=='' || data_city=='' || data_cat=='' 
        || data_difficulty=='' || data_preptime=='' || data_totaltime=='' || data_servings==''
        || data_description=='' || data_ingredients=='' || data_preparations==''
        ){
            valida = 'no';
        };

        if(photo=='' && id==''){
            valida = 'no';
        };

        if(valida == 'si'){

            let datos = new FormData(this);
            datos.append('data_description', data_description);
            datos.append('data_ingredients', data_ingredients);
            datos.append('data_preparations', data_preparations);
            datos.append('id', id);

            $.ajax({
                type: 'POST',
                url: '/admin/tastier_life/recipe/store',
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
                            localStorage.setItem('tastierLifeMessage', "{{trans('tastier_life.recipes.edit_success')}}");
                        <?php }else{?>
                            localStorage.setItem('tastierLifeMessage', "{{trans('tastier_life.recipes.create_success')}}");
                        <?php };?>
                    }else{
                        localStorage.setItem('tastierLifeMessageError', 'Error:' + msg.message);
                    };
                    window.location ='/admin/tastier_life?section=recipes&page=1';
                    document.getElementById("btnSubmit").disabled = false;
                }
            });
            //*/
            //alert("Iniciative was successfully saved");

        }else{

            if(data_name=='' || (photo=='' && id=='') || data_chef=='' || data_city=='' || data_cat==''
            || data_difficulty=='' || data_preptime=='' || data_totaltime=='' || data_servings==''
            || data_description=='' || data_ingredients=='' || data_preparations==''
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
                if(data_chef==''){
                    document.getElementById("data_chef").className =  'form-control is-invalid';
                    document.getElementById("data_chef_validation").style.display =  'block';
                };
                if(data_city==''){
                    document.getElementById("data_city").className =  'form-control is-invalid';
                    document.getElementById("data_city_validation").style.display =  'block';
                };
                if(data_cat==''){
                    document.getElementById("data_cat").className =  'form-control is-invalid';
                    document.getElementById("data_cat_validation").style.display =  'block';
                };
                if(data_difficulty==''){
                    document.getElementById("data_difficulty").className =  'form-control is-invalid';
                    document.getElementById("data_difficulty_validation").style.display =  'block';
                };
                if(data_preptime==''){
                    document.getElementById("data_preptime").className =  'form-control is-invalid';
                    document.getElementById("data_preptime_validation").style.display =  'block';
                };
                if(data_totaltime==''){
                    document.getElementById("data_totaltime").className =  'form-control is-invalid';
                    document.getElementById("data_totaltime_validation").style.display =  'block';
                };
                if(data_servings==''){
                    document.getElementById("data_servings").className =  'form-control is-invalid';
                    document.getElementById("data_servings_validation").style.display =  'block';
                };
                if(data_description==''){
                    document.getElementById("data_description").className =  'form-control is-invalid';
                    document.getElementById("data_description_validation").style.display =  'block';
                }
                if(data_ingredients==''){
                    document.getElementById("data_ingredients").className =  'form-control is-invalid';
                    document.getElementById("data_ingredients_validation").style.display =  'block';
                }
                if(data_preparations==''){
                    document.getElementById("data_preparations").className =  'form-control is-invalid';
                    document.getElementById("data_preparations_validation").style.display =  'block';
                }
            };

            alert(errorMessage);
            document.getElementById("btnSubmit").disabled = false;
        };
    });
</script>
@endsection
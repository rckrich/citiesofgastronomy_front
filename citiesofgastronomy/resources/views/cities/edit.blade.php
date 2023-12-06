<!-- resources/views/admin/cities.blade.php -->

@extends('commons.admin_base')

@section('content')
<section id="admin_cities_edit">
    <form action="/admin/completeUpdate" method="POST" enctype="multipart/form-data"  id="deepInfoForm" class="container p-5">
        <input type="hidden" name="data_id" value="<?= $id?>">
        <input type="hidden" name="completeInfo" value="1">
        @csrf
        <div class="row mx-0">
            <div class="col-12 px-0 pt-2 pb-4">
                <h3 class="admin-title"><b>{{__('cities.edit.title')}}</b></h3>
            </div>
            <div class="col-12 px-0 py-4">
                <p class="admin-subtitle"><b>{{__('cities.edit.data_logo')}} </b></p>

                <div class="my-3 w-25" id="phototbl" <?php  if(!$city['photo']){echo 'style="display:none"';}?> >
                    <!--<div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/></div>-->
                    <img class="gallery-img w-100" src="<?php if($city['photo']){echo config('app.url').$city['photo'];}?>" id="imgFile"/>
                </div>
                <div class="p-2">
                    <label class="custom-file-upload btn btn-primary" for="city_logo">
                        <input type="file" class="inputImage" name="photo" id="photo"
                                onChange="sel_file('imgFile', 'photo', 'phototbl', 'block')">
                        <?php if($city['photo']){ echo __('cities.edit.btn_image');}else{echo 'SELECT IMAGE';};?>
                    </label>
                </div>

            </div>
            <div class="col-12 px-0 py-4">
                <p class="admin-subtitle"><b>{{__('cities.edit.data_banner')}}</b></p>
                <!--si existe imagen (solo aplica aquí)-->
                <div class="my-3 w-50" id="bannertbl" <?php  if(!$city['banner']){echo 'style="display:none"';}?>>
                    <!--<div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/></div>-->
                    <img class="gallery-img w-100" src="<?php if($city['banner']){echo config('app.url').$city['banner'];}?>" id="imgBanner"/>
                </div>
                <div class="p-2">
                    <label class="custom-file-upload btn btn-black" for="banner">
                        <input type="file" class="inputImage" name="banner" id="banner"
                        onChange="sel_file('imgBanner', 'banner', 'bannertbl', 'block')">
                            <?php if($city['banner']){ echo __('cities.edit.btn_image');}else{echo 'SELECT IMAGE';};?>
                    </label>
                </div>
            </div>
        </div>
        <div class="bb-gray my-4"></div>
        <div class="row mx-0">
            <div class="col-12 px-0 my-2">
                <p class="section-title"><b>{{__('cities.edit.section_facts')}}</b></p>
            </div>
            <div class="col-12 px-0 my-2">
                <div class="pb-5 my-3">
                    <div class="form-group py-2">
                        <label class="form-label" for="data_city">{{__('cities.edit.data_city')}}</label>
                        <input id="name" name="name" class="form-control" value="{{ $city['name'] }}"
                            placeholder="{{__('cities.edit.ph_city')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_continent">{{__('cities.edit.data_country')}}</label>
                        <input id="country" name="country" class="form-control" value="{{ $city['country'] }}"
                            placeholder="{{__('cities.edit.ph_country')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_continent">{{__('cities.edit.data_continent')}} </label>
                        <select id="idContinent" name="idContinent" class="form-control">
                                @foreach($continents as $continent)
                                <option value="{{ $continent['id'] }}" <?php
                                if($continent['id'] == $city['continentId'] ){echo 'selected';};
                                ?>>{{ $continent["name"] }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_population">{{__('cities.edit.data_population')}}</label>
                        <input id="population" name="population" class="form-control" value="{{ $city['population'] }}"
                        placeholder="{{__('cities.edit.ph_population')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_locations">{{__('cities.edit.data_locations')}}</label>
                        <input id="restaurantFoodStablishments" name="restaurantFoodStablishments" class="form-control" value="{{ $city['restaurantFoodStablishments'] }}"
                        placeholder="{{__('cities.edit.ph_locations')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_locations">{{__('cities.edit.data_dyear')}}</label>
                        <input id="data_dyear" name="data_dyear" class="form-control" value="{{ $city['designationyear'] }}""
                        placeholder="{{__('cities.edit.ph_dyear')}}"/>
                    </div>
                    <div class="bb-gray mt-4 mb-2"></div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('cities.edit.data_description')}}</label>
                        <textarea id="description" name="description" class="form-control"
                        placeholder="{{__('cities.edit.ph_description')}}"></textarea>
                    </div>
                    <div class="row py-2">
                        <p class="form-label"><b>{{__('cities.edit.section_gallery')}}</b></p>
                        <div class="row py-2" id="galleryTBL">
                            @for($i=1; $i < count($gallery)+1; $i++)
                            <?php $s = $i - 1?>
                            <div class="col-2 py-2 mx-2" id="imageTBL<?= $i?>">
                                <div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"
                                        onclick="deletefuncion('<?= $i?>')"/></div>
                                <img class="gallery-img w-100" src="{{config('app.url').$gallery[$s]['image']}}"/>
                                <input type="hidden" id="idImage<?= $i?>" name="idImage<?= $i?>" value="{{$gallery[$s]['id']}}">
                                <input type="hidden" id="deleteImage<?= $i?>" name="deleteImage<?= $i?>">
                            </div>
                            @endfor

                            <input type="hidden" id="cant_gallery" name="cant_gallery" value="<?= $i?>">

                            <?php $e = count($gallery)+1?>
                            <div class="col-2 py-2 mx-2 row text-center" id="imageTBL<?= $e?>" style="display:block">
                                <div class="text-right" id="deleteIcon<?= $e?>" style="display:none">
                                        <img class="delete-img"src="{{asset('assets/icons/delete.png')}}"
                                        onclick="deletefuncion('<?= $e?>')"/>
                                </div>
                                <img class="gallery-img w-100" id="thumbImage<?= $e?>" style="display:none"/>
                                <div class="col-12 p-2 load-img h-100 row mx-0 align-items-center">
                                    <input type="file" class="inputImage" name="image<?= $e?>" id="image<?= $e?>"
                                            onChange="imageSelection('<?= $e?>')" style="width:100%;    background-size: cover;">
                                    <label class="custom-file-upload" for="new_gallery_img">
                                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                                    </label>
                                    <input type="hidden" id="idImage<?= $e?>" name="idImage<?= $e?>">
                                    <input type="hidden" id="deleteImage<?= $e?>" name="deleteImage<?= $e?>">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('cities.edit.section_links')}}</label>
                        <div class="row mx-0 align-items-center">
                            <div id="linkSection">
                                <!--si es link-->
                                @for($i=1; $i < count($links)+1; $i++)
                                <?php $s = $i - 1?>
                                <div class="row mx-0 align-items-center" id="linkTBL<?= $i?>">
                                    <div class="col-10 px-0 py-2">
                                        <input id="titleLink<?= $i?>" name="titleLink<?= $i?>" class="form-control"
                                                value="{{$links[$s]['title']}}" placeholder="{{__('cities.edit.ph_document')}}"/>
                                        <input type="hidden" id="link<?= $i?>" name="link<?= $i?>" value="{{$links[$s]['image']}}">
                                    </div>
                                    <div class="col-1 p-2 text-right"><img class="mx-auto" width="38" height="38"
                                            src="{{asset('assets/icons/edit_file.png')}}" onclick="editLinkFN('<?= $i?>')"
                                            data-bs-toggle="modal" data-bs-target="#uploadLinkModal"/>
                                        </div>
                                    <div class="col-1 p-2 text-left"><img class="mx-auto" width="38" height="38" src="{{asset('assets/icons/delete_file.png')}}"/></div>
                                    <input type="hidden" id="idLink<?= $i?>" name="idLink<?= $i?>" value="{{$links[$s]['id']}}">
                                    <input type="hidden" id="deleteLink<?= $i?>" name="deleteLink<?= $i?>">
                                </div>
                                @endfor
                            </div>
                            <input type="hidden" id="cant_links" name="cant_links" value="<?php echo $i - 1?>">
                            <!--si es pdf-->
                            <div class="col-10 px-0 py-2">
                                <input id="data_description" name="data_description" class="form-control" placeholder="{{__('cities.edit.ph_document')}}"/>
                            </div>
                            <div class="col-1 p-2 text-right hover-pointer"><img class="mx-auto" width="38" height="38" data-bs-toggle="modal" data-bs-target="#uploadPDFModal"  src="{{asset('assets/icons/edit_file.png')}}"/></div>
                            <div class="col-1 p-2 text-left"><img class="mx-auto" width="38" height="38" src="{{asset('assets/icons/delete_file.png')}}"/></div>

                            <div class="col-12 px-0 py-2 row mx-0">
                                <div class="col-auto ps-0"><button type="button" class="btn btn-dark w-100" onclick="addLinkFN()"
                                  data-bs-toggle="modal" data-bs-target="#uploadLinkModal">{{__('cities.edit.btn_link')}}</buttton></div>
                                <div class="col-auto"><button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#uploadPDFModal">{{__('cities.edit.btn_pdf')}}</buttton></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group py-5">
                        <div class="col-auto ms-auto"><a href="{{route('admin.cities')}}"
                        class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button onclick="submitForm()"
                                class="btn btn-primary w-100">{{__('admin.btn_edit')}}</buttton></div>
                    </div>
                </div>
            </div>
        </div>


    </form action="/admin/store" method="POST" enctype="multipart/form-data" >
</section>
<!--MODAL ADD infinito tabla de link -->
            <div class="row mx-0 align-items-center" id="linkTBL0" style="display:none">
                <div class="col-10 px-0 py-2">
                    <input id="titleLink0" name="titleLink0" class="form-control"
                            value="" placeholder="{{__('cities.edit.ph_document')}}"/>
                    <input type="hidden" id="link0" name="link0" value="">
                </div>
                <div class="col-1 p-2 text-right"><img class="mx-auto" width="38" height="38"
                data-bs-toggle="modal" data-bs-target="#uploadLinkModal" src="{{asset('assets/icons/edit_file.png')}}"/></div>
                <div class="col-1 p-2 text-left"><img class="mx-auto" width="38" height="38" src="{{asset('assets/icons/delete_file.png')}}"/></div>
                <input type="hidden" id="idLink0" name="idLink0" value="">
                <input type="hidden" id="deleteLink0">
            </div>

<!-- Modal UPLOAD LINK-->
<div class="modal fade" id="uploadLinkModal" tabindex="-1" aria-labelledby="uploadLinkModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="uploadLinkModalLabel">{{__('cities.edit.upload_link_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
            <div class="modal-body px-4">
                <div class="form-group py-2">
                    <label class="form-label" for="data_link_name">{{__('cities.edit.data_link_name')}}</label>
                    <input id="data_link_name" name="data_link_name" class="form-control" placeholder="{{__('cities.edit.ph_link_name')}}"/>
                </div>
                <div class="form-group py-2">
                    <label class="form-label" for="data_link">{{__('cities.edit.data_link')}}</label>
                    <input id="data_link" name="data_link" class="form-control" placeholder="{{__('cities.edit.ph_link')}}"/>
                </div>
            </div>
            <div class="modal-footer b-none row mx-0">
                <button type="button" class="col-auto btn btn-primary mx-auto" onclick="saveLink()" id="btnsavelink"
                data-bs-dismiss="modal">{{__('admin.btn_add')}}</buttton>
            </div>
            <input type="hidden" id="idLinkGral">
        </form>
    </div>
  </div>
</div>

<!-- Modal UPLOAD PDF-->
<div class="modal fade" id="uploadPDFModal" tabindex="-1" aria-labelledby="uploadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="uploadPDFModalLabel">{{__('cities.edit.upload_pdf_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_pdf_name">{{__('cities.edit.data_pdf_name')}}</label>
                <input id="data_pdf_name" name="data_pdf_name" class="form-control" placeholder="{{__('cities.edit.ph_pdf_name')}}"/>
            </div>
            <div class="py-2 row mx-0">
                <p class="form-label px-0" for="new_city_img">{{__('cities.edit.data_pdf')}}</p>
                <div class="col-12 p-2 h-100 row mx-0 align-items-center text-center load-file">
                    <label class="custom-file-upload btn btn-dark" for="new_gallery_img" style="width: 150px">
                        <img class="mx-auto" src="{{asset('assets/icons/file.svg')}}" width="20" height="24"/>
                    </label>
                    <input type="file" class="px-0 file-input" name="new_gallery_img" id="new_gallery_img">
                </div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-auto btn btn-primary mx-auto">{{__('admin.btn_add')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>




<!-- Modal link -->
<!--<div class="row mx-0 align-items-center" id="linkTBL0">
                            <div class="col-10 px-0 py-2">
                                <input id="data_description" name="data_description" class="form-control" placeholder="{{__('cities.edit.ph_document')}}"/>
                            </div>
                            <div class="col-1 p-2 text-right"><img class="mx-auto" width="38" height="38" src="{{asset('assets/icons/edit_file.png')}}"/></div>
                            <div class="col-1 p-2 text-left"><img class="mx-auto" width="38" height="38" src="{{asset('assets/icons/delete_file.png')}}"/></div>

                        </div>
-->
<!-- Modal Gallery -->
<div class="col-2 py-2 mx-2 row text-center" id="imageTBL0" style="display:none">
                                <div class="text-right" id="deleteIcon0" style="display:none">
                                        <img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/>
                                </div>
                                <img class="gallery-img w-100" id="thumbImage0" style="display:none"/>
                                <div class="col-12 p-2 load-img h-100 row mx-0 align-items-center position-relative" id="plusIMG0">
                                    <input type="file" class="inputImage" name="image0" id="image0"
                                            onChange="imageSelection('0')" style="width:100%;    background-size: cover;">
                                    <label class="custom-file-upload" for="new_gallery_img">
                                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}"
                                         width="80" height="80"/>
                                    </label>
                                    <input type="hidden" id="idImage0" name="idImage0">
                                    <input type="hidden" id="deleteImage0" name="deleteImage0">
                                </div>
                            </div>


<script>


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
    var jss1 = "deletefuncion('"+nuevovalor+"')";
    padre3[0].setAttribute("onchange", jss1);

    let padre4 = document.getElementById(nuevaid).getElementsByTagName("img");
    padre4[1].id = 'thumbImage' + nuevovalor;
    padre4[1].name = 'thumbImage' + nuevovalor;

document.getElementById(nuevaid).style.display = 'block';
document.getElementById("cant_gallery").value = item +1;

}
</script>
<script>

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
    });
});

    function sel_file(destiny, origin, table, displ){
        let Element = document.getElementById(origin);
        let img = document.getElementById(destiny);
        let url = URL.createObjectURL(Element.files[0]);
            img.src = url;
        if(table){
            document.getElementById(table).style.display = displ;
        };
    }

//    deepInfoForm


function deletefuncion(id){
    let id1 = "imageTBL"+id ;
    document.getElementById(id1).style.display = 'none';
     id1 = "deleteImage"+id ;
    document.getElementById(id1).value = '1' ;
}

function saveLink(){
    let cantidad = document.getElementById("cant_links").value;
    cant_links = parseInt(cantidad);
    console.log("#"+cant_links);
    let nuevovalor = cant_links + 1;
    console.log("Link #"+cantidad);
    console.log("Link nuevo #"+nuevovalor);

    let dataLinkName = document.getElementById("data_link_name").value;
    let dataLink = document.getElementById("data_link").value;
    let idLinkGral = document.getElementById("idLinkGral").value;

    if(idLinkGral == ''){
        console.log("#Agrega");
        let nuevaid = 'linkTBL'+nuevovalor;
        let clonedDiv = $('#linkTBL0').clone();
        clonedDiv.attr("id", nuevaid); // Cambio id
        $('#linkSection').append(clonedDiv);// lo coloco en este div

        let padre = document.getElementById(nuevaid).getElementsByTagName("input");
        padre[0].id = 'titleLink' + nuevovalor;
        padre[0].name = 'titleLink' + nuevovalor;
        padre[0].value = dataLinkName;
        padre[1].id = 'link' + nuevovalor;
        padre[1].name = 'link' + nuevovalor;
        padre[1].value = dataLink;
        padre[2].id = 'idLink' + nuevovalor;
        padre[2].name = 'idLink' + nuevovalor;
        padre[3].id = 'deleteLink' + nuevovalor;
        padre[3].name = 'deleteLink' + nuevovalor;

        let padre2 = document.getElementById(nuevaid).getElementsByTagName("div");
        var jss1 = "editLinkFN('"+nuevovalor+"')";
        padre2[1].setAttribute("onclick", jss1);


        document.getElementById(nuevaid).style.display = '';
        document.getElementById("cant_links").value =nuevovalor;
    }else{
        console.log("#Modifica");
        console.log(idLinkGral);
        let id1 = 'titleLink' +idLinkGral;
        document.getElementById(id1).value = dataLinkName;
        id1 = 'link' +idLinkGral;
        document.getElementById(id1).value = dataLink;
    };
}

function addLinkFN(){
    document.getElementById("data_link_name").value = '';
    document.getElementById("data_link").value = '';
    document.getElementById("idLinkGral").value = '';
    document.getElementById("btnsavelink").innerHTML = '<?php echo __('admin.btn_add')?>';
}

function editLinkFN(id){
console.log("-->"+id);
    let id1  = 'titleLink'+id;
    document.getElementById("data_link_name").value = document.getElementById(id1).value;
    id1  = 'link'+id;
    document.getElementById("data_link").value = document.getElementById(id1).value;
    id1  = 'idLink'+id;
    document.getElementById("idLinkGral").value = id;//document.getElementById(id1).value;
    document.getElementById("btnsavelink").innerHTML = '<?php echo __('admin.btn_edit')?>';
}

$("#deepInfoForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/admin/completeUpdate',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                //$('#fupForm').css("opacity",".5");
            },
            success: function(msg){
                alert("City was successfully saved");
                /*
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                //$('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                //*/
            }
        });
    });
</script>


@endsection

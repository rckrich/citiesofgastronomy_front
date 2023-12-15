<!-- resources/views/admin/cities.blade.php -->

@extends('commons.admin_base')

@section('content')


<x-loading />

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

                <div class="my-3 w-25" id="logotbl" <?php  if(!$city['logo']){echo 'style="display:none"';}?> >
                    <!--<div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/></div>-->
                    <img class="gallery-img w-100" src="<?php if($city['logo']){echo config('app.url').$city['logo'];}?>" id="imgFile"/>
                </div>
                <div class="p-2">
                    <label class="custom-file-upload btn btn-primary position-relative" for="city_logo">
                        <input type="file" class="inputImage" name="logo" id="logo"
                                onChange="sel_file('imgFile', 'logo', 'logotbl', 'block')">
                        <?php if($city['logo']){ echo __('cities.edit.btn_image');}else{echo 'SELECT IMAGE';};?>
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
                        <div id="validation_name" class="invalid-feedback">Obligatory field</div>
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
                        <div id="validation_continent" class="invalid-feedback">Obligatory field</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_population">{{__('cities.edit.data_population')}}</label>
                        <input type=number id="population" name="population" class="form-control" value="{{ $city['population'] }}"
                        placeholder="{{__('cities.edit.ph_population')}}" type="number" min="0"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_locations">{{__('cities.edit.data_locations')}}</label>
                        <input id="restaurantFoodStablishments" name="restaurantFoodStablishments" class="form-control" value="{{ $city['restaurantFoodStablishments'] }}"
                        placeholder="{{__('cities.edit.ph_locations')}}" type="number" min="0"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_locations">{{__('cities.edit.data_dyear')}}</label>
                        <input id="data_dyear" name="data_dyear" class="form-control" value="{{ $city['designationyear'] }}"
                            placeholder="{{__('cities.edit.ph_dyear')}}" type="number" min="0"/>
                        <div id="validation_data_dyear" class="invalid-feedback">Obligatory field</div>
                    </div>
                    <div class="bb-gray mt-4 mb-2"></div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('cities.edit.data_description')}}</label>
                        <textarea id="description" name="description" class="form-control"
                        placeholder="{{__('cities.edit.ph_description')}}">{{ $city['description'] }}</textarea>
                    </div>
                    <div class="row py-2">
                        <p class="form-label"><b>{{__('cities.edit.section_gallery')}}</b></p>
                        <div class="row py-2" id="galleryTBL">
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

                            <?php $e = count($gallery)+1?>
                            <div class="col-2 py-2 mx-2 row text-center" id="imageTBL<?= $e?>" style="display:block">
                                <div class="text-right" id="deleteIcon<?= $e?>" style="display:none">
                                        <img class="delete-img"src="{{asset('assets/icons/delete.png')}}"
                                        onclick="deletefuncion('<?= $e?>', 'imageTBL', 'deleteImage')"/>
                                </div>
                                <img class="gallery-img w-100" id="thumbImage<?= $e?>" style="display:none"/>
                                <div class="col-12 p-2 load-img h-100 row mx-0 align-items-center position-relative"  id="plusIMG<?= $e?>">
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
                                            src="{{asset('assets/icons/edit_file.png')}}" onclick="editLinkFN('<?= $i?>')"/>
                                        </div>
                                    <div class="col-1 p-2 text-left"><img class="mx-auto" width="38" height="38"
                                            onclick="deletefuncion('<?= $i?>', 'linkTBL', 'deleteLink')"
                                            src="{{asset('assets/icons/delete_file.png')}}"/></div>
                                    <input type="hidden" id="idLink<?= $i?>" name="idLink<?= $i?>" value="{{$links[$s]['id']}}">
                                    <input type="hidden" id="deleteLink<?= $i?>" name="deleteLink<?= $i?>">
                                </div>
                                @endfor
                                <!--si es files-->
                                @for($s=1; $s < count($files)+1; $s++)
                                <?php $y = $s - 1?>
                                <div class="row mx-0 align-items-center" id="filesTBL<?= $s?>">
                                    <div class="col-10 px-0 py-2">
                                        <input id="titlefile<?= $s?>" name="titlefile<?= $s?>" class="form-control"
                                                value="{{$files[$y]['title']}}" placeholder="{{__('cities.edit.ph_document')}}"/>
                                        <input type="hidden" id="file<?= $s?>" name="file<?= $s?>" value="{{$files[$y]['file']}}">
                                    </div>
                                    <div class="col-1 p-2 text-right"><img class="mx-auto" width="38" height="38"
                                            src="{{asset('assets/icons/edit_file.png')}}" onclick="editFileFN('<?= $s?>')"/>
                                        </div>
                                    <div class="col-1 p-2 text-left"><img class="mx-auto" width="38" height="38"
                                            onclick="deletefuncion('<?= $s?>', 'filesTBL', 'deleteFile')"
                                            src="{{asset('assets/icons/delete_file.png')}}"/></div>
                                    <input type="hidden" id="idFile<?= $s?>" name="idFile<?= $s?>" value="{{$files[$y]['id']}}">
                                    <input type="hidden" id="deleteFile<?= $s?>" name="deleteFile<?= $s?>">
                                </div>
                                @endfor
                            </div>
                            <input type="hidden" id="cant_links" name="cant_links" value="<?php echo $i - 1?>">
                            <input type="hidden" id="cant_files" name="cant_files" value="<?php echo $s - 1?>">

                            <div class="col-12 px-0 py-2 row mx-0">
                                <div class="col-auto ps-0"><button type="button" class="btn btn-dark w-100" onclick="addLinkFN()"
                                  >{{__('cities.edit.btn_link')}}</buttton></div>
                                <div class="col-auto"><button type="button" class="btn btn-dark w-100" onclick="editFileFN()"
                                >{{__('cities.edit.btn_pdf')}}</buttton></div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group py-5">
                        <div class="col-auto ms-auto"><a href="{{route('admin.cities')}}"
                        class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button onclick="submitForm()" id="btnSubmit"
                                class="btn btn-primary w-100">{{__('admin.btn_edit')}}</buttton></div>
                    </div>
                </div>
            </div>
        </div>


    </form >
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
    <div class="modal-dialog position-relative">
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
                    <button type="button" class="col-auto btn btn-primary mx-auto" onclick="saveLink()" id="btnsavelink">{{__('admin.btn_add')}}</buttton>
                </div>
                <input type="hidden" id="idLinkGral">
            </form>
        </div>
  </div>
</div>

<!-- Modal UPLOAD PDF-->
<div class="modal fade" tabindex="-1" id="uploadPDFModal" aria-labelledby="uploadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog position-relative">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="uploadPDFModalLabel">{{__('cities.edit.upload_pdf_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="closePDFModal()"></button>
        </div>
        <form action="/admin/addPDF"  id="uploadPDFForm" method="POST" enctype="multipart/form-data"  id="deepInfoForm">
            <input type="hidden" id="idFileGral" name="idFileGral">
            @csrf
            <input type="hidden" id="itemFile" value="">
            <input type="hidden" id="idOwner" name="idOwner" value="<?= $id?>">
            <input type="hidden" id="idSection" name="idSection" value="1">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_pdf_name">{{__('cities.edit.data_pdf_name')}}</label>
                <input id="titlePDF" name="titlePDF" class="form-control" placeholder="{{__('cities.edit.ph_pdf_name')}}"/>
                <div id="validation_PDFtitle" class="invalid-feedback" style="display: none;">Obligatory field</div>
            </div>
            <div class="py-2 row mx-0">
                <p class="form-label px-0" for="new_city_img">{{__('cities.edit.data_pdf')}}</p>
                <div class="col-12 p-2 h-100 row mx-0 align-items-center text-center load-file">
                    <label class="custom-file-upload btn btn-dark position-relative" for="new_gallery_img" style="width: 150px">
                        <input type="file" id="filePDF" name="filePDF" class="inputImage" onchange="filechange()">
                        <img class="mx-auto" src="{{asset('assets/icons/file.svg')}}" id="fileUpImg" width="20" height="24"/>
                    </label>
                    <div id="fileUpTxt" class="fw-lighter font-size-sm text-dark text-start p-0"></div>
                <div id="validation_PDF" class="invalid-feedback text-start" style="display: none;">Obligatory field</div>
                </div>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <!--<button type="button"  onclick="submitFormPDF()" class="col-auto btn btn-primary mx-auto">{{__('admin.btn_add')}}</buttton>-->
            <input type="submit" class="col-auto btn btn-primary mx-auto" value="{{__('admin.btn_add')}}"
                     id="btnSubmitPDF">
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
                                            onChange="imageSelection('0')" style="width:100%;      height: 100%;">
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
    var jss1 = "deletefuncion('"+nuevovalor+"', 'imageTBL', 'deleteImage')";
    padre3[0].setAttribute("onchange", jss1);

    let padre4 = document.getElementById(nuevaid).getElementsByTagName("img");
    padre4[1].id = 'thumbImage' + nuevovalor;
    padre4[1].name = 'thumbImage' + nuevovalor;

document.getElementById(nuevaid).style.display = 'block';
document.getElementById("cant_gallery").value = item +1;

}
</script>


<script>
//PDFModal.show(modalToggle)
//*/
</script>
<script>
 var PDFModal;var modalToggle;
 var LinkModal;var linkModalToggle;
 //PDFModal.hide(modalToggle);
 //LinkModal.hide(linkModalToggle);

$(document).ready(function(e){


    //inicializo el modal PDF en Botstrapp
    PDFModal = new bootstrap.Modal('#uploadPDFModal', { keyboard: false    });
    modalToggle = document.getElementById("uploadPDFModal");

    //inicializo el modal links en Botstrapp
    LinkModal = new bootstrap.Modal('#uploadLinkModal', { keyboard: false    });
    linkModalToggle = document.getElementById("uploadLinkModal");

//*/
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


//    deepInfoForm


function saveLink(){
    let cantidad = document.getElementById("cant_links").value;
    cant_links = parseInt(cantidad);

    let nuevovalor = cant_links + 1;

    let dataLinkName = document.getElementById("data_link_name").value;
    let dataLink = document.getElementById("data_link").value;
    let idLinkGral = document.getElementById("idLinkGral").value;

    //si no hay nombre agrego el link en el nombre
    if(dataLinkName==''){
        console.log("link SIN NOMBRE");
        dataLinkName = dataLink;
    };


    if(dataLink!=''){
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

                let padre2 = document.getElementById(nuevaid).getElementsByTagName("img");
                let jss1 = "editLinkFN('"+nuevovalor+"')";
                padre2[0].setAttribute("onclick", jss1);
                jss1 = "deletefuncion('"+nuevovalor+"', 'linkTBL', 'deleteLink')";
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
            LinkModal.hide(linkModalToggle);
    }else{
        console.log("#E-0");
        let message = "fill out all the data";
        /*if(dataLinkName==''){
            console.log("#E-1");
            document.getElementById("data_link_name").className = 'form-control is-invalid';
            //document.getElementById('validation_LinkTitle').style.display = 'block';
        };//*/
        if(dataLink==''){
            console.log("#E-1");
            document.getElementById("data_link").className = 'form-control is-invalid';
            //document.getElementById('validation_Link').style.display = 'block';
        };
        alert(message);
    }
}

function addLinkFN(){
    LinkModal.show(linkModalToggle);
    document.getElementById("data_link_name").value = '';
    document.getElementById("data_link").value = '';
    document.getElementById("idLinkGral").value = '';
    document.getElementById("btnsavelink").innerHTML = '<?php echo __('admin.btn_add')?>';
    document.getElementById("data_link_name").className = 'form-control';
            //document.getElementById('validation_LinkTitle').style.display = 'block';
    document.getElementById("data_link").className = 'form-control';
            //document.getElementById('validation_Link').style.display = 'block';
}

function editLinkFN(id){
    LinkModal.show(linkModalToggle);
console.log("-->"+id);
    let id1  = 'titleLink'+id;
    document.getElementById("data_link_name").value = document.getElementById(id1).value;
    id1  = 'link'+id;
    document.getElementById("data_link").value = document.getElementById(id1).value;
    id1  = 'idLink'+id;
    document.getElementById("idLinkGral").value = id;//document.getElementById(id1).value;
    document.getElementById("btnsavelink").innerHTML = '<?php echo __('admin.btn_edit')?>';

    document.getElementById("data_link_name").className = 'form-control';
            //document.getElementById('validation_LinkTitle').style.display = 'block';
    document.getElementById("data_link").className = 'form-control';
            //document.getElementById('validation_Link').style.display = 'block';
}

$("#deepInfoForm").on('submit', function(e){
        e.preventDefault();
        document.getElementById("btnSubmit").disabled = true;

        let city  = document.getElementById("name").value;
        let continent = document.getElementById("idContinent").value;
        let designationYear = document.getElementById("data_dyear").value;

        let population = document.getElementById("population").value;
        let restaurantFoodStablishments = document.getElementById("restaurantFoodStablishments").value;
        //let data_dyear = document.getElementById("data_dyear").value;

        if(city!='' && continent!='' && designationYear!=''){
            //saco los cuadros rojos si los hubiera
                document.getElementById("name").className = 'form-control';
                document.getElementById('validation_name').style.display = 'none';
                document.getElementById("idContinent").className = 'form-control';
                document.getElementById('validation_continent').style.display = 'none';
                document.getElementById("data_dyear").className = 'form-control';
                document.getElementById('validation_data_dyear').style.display = 'none';
            ///////////////////////////////////////
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
                        localStorage.setItem('message', 'City was successfully edited');
                        window.location ='/admin/cities/';
                        //alert("City was successfully saved");
                        document.getElementById("btnSubmit").disabled = false;
                    }
                });
        }else{
            if(city==''){
                console.log("no tiene nombre de ciudad");
                document.getElementById("name").className = 'form-control is-invalid';
                document.getElementById('validation_name').style.display = 'block';
            };
            if(continent==''){
                console.log("no tiene seleccionado continent");
                document.getElementById("idContinent").className = 'form-control is-invalid';
                document.getElementById('validation_continent').style.display = 'block';
            };
            if(designationYear==''){
                console.log("no tiene selecconado designationYear");
                document.getElementById("data_dyear").className = 'form-control is-invalid';
                document.getElementById('validation_data_dyear').style.display = 'block';
            };

            let message = "fill out all the data";
            alert(message);
                        document.getElementById("btnSubmit").disabled = false;
        };
    });


   $("#uploadPDFForm").on('submit', function(e){
       e.preventDefault();

       $valida = 'no';
        let PDFform = $("#uploadPDFForm");
        document.getElementById("loading").style.display = 'block';
        let idFileGral = document.getElementById("idFileGral").value;
        let itemFile =  document.getElementById("itemFile").value;
        let filePDF =  document.getElementById("filePDF").value;
        let title =  document.getElementById("titlePDF").value;
        let id1 = '';
        if(idFileGral !=''&&title!=''){   $valida = 'si'; };
        if(idFileGral ==''&&filePDF!=''&&title!=''){   $valida = 'si'; };

        //VERIFICO extencion
        file1 = document.getElementById("filePDF").value;
        let extencion = file1.split('.').pop();
        if(extencion!='pdf'){$valida = 'no';};

        if($valida == 'si'){

                $.ajax({
                    type: 'POST',
                    url: '/admin/addPDF',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        //$('.submitBtn').attr("disabled","disabled");
                        //$('#fupForm').css("opacity",".5");
                    },
                    success: function(msg){
                        let e = JSON.parse(msg);
                        console.log("el id es :: "+idFileGral);
                        console.log(msg);
                        console.log(msg.datta);
                        if(!idFileGral){
                            console.log("#si paso");
                            addFile(e["datta"]["id"], e["datta"]["title"], e["datta"]["file"]);
                        }else{//titlePDF
                            id1 = 'titlefile' + itemFile;
                            document.getElementById(id1).value = e["datta"]["title"];
                            id1 = 'file' + itemFile;
                            document.getElementById(id1).value = e["datta"]["file"];
                        };
                        //  alert("PDF was successfully saved");
                        PDFModal.hide(modalToggle);
                        document.getElementById("loading").style.display = 'none';

                    }
                });

        }else{
            let message = "fill out all the data";
                        document.getElementById("loading").style.display = 'none';
                        console.log(extencion);
                        if(title==''){
                            console.log("no tiene titulo");
                            document.getElementById("titlePDF").className = 'form-control is-invalid';
                            document.getElementById('validation_PDFtitle').style.display = 'block';
                        };
                        if(filePDF==''){
                            document.getElementById('validation_PDF').style.display = 'block';
                        }else if(extencion!='pdf'){
                            console.log("NOT PDF");
                            message = 'wrong file extension, only pdf accepted';
                        };

                        alert(message);
        };
    });

    function closePDFModal(){
        PDFModal.hide(modalToggle);
    }

    function addFile(id, title, file){
        let cantidad = document.getElementById("cant_files").value;
        cantidad = parseInt(cantidad);
        let = nuevovalor = cantidad + 1;

        let nuevaid = 'filesTBL'+nuevovalor;
        let clonedDiv = $('#linkTBL0').clone();
        clonedDiv.attr("id", nuevaid); // Cambio id
        $('#linkSection').append(clonedDiv);// lo coloco en este div

        let padre = document.getElementById(nuevaid).getElementsByTagName("input");
        padre[0].id = 'titlefile' + nuevovalor;
        padre[0].name = 'titlefile' + nuevovalor;
        padre[0].value = title;
        padre[1].id = 'file' + nuevovalor;
        padre[1].name = 'file' + nuevovalor;
        padre[1].value = file;
        padre[2].id = 'idFile' + nuevovalor;
        padre[2].name = 'idFile' + nuevovalor;
        padre[2].value = id;
        padre[3].id = 'deleteLink' + nuevovalor;
        padre[3].name = 'deleteFile' + nuevovalor;

        let padre2 = document.getElementById(nuevaid).getElementsByTagName("img");
        let jss1 = "editFileFN('"+nuevovalor+"')";
        padre2[0].setAttribute("onclick", jss1);
        padre2[0].setAttribute("data-bs-target", "#uploadPDFModal");
        jss1 = "deletefuncion('"+nuevovalor+"', 'filesTBL', 'deleteFile')";
        padre2[1].setAttribute("onclick", jss1);


        document.getElementById(nuevaid).style.display = '';
        document.getElementById("cant_files").value =nuevovalor;
    }

    function editFileFN(itemNum){
        //reseteo los mensajes rojos y otros
        document.getElementById("titlePDF").className = 'form-control ';
        document.getElementById('validation_PDFtitle').style.display = 'none';
        document.getElementById('validation_PDF').style.display = 'none';
        document.getElementById('fileUpTxt').innerHTML = '';

        if( !itemNum ){// SI ES AGREGAR
            document.getElementById("titlePDF").value = '';
            document.getElementById("idFileGral").value = '';
            document.getElementById("btnSubmitPDF").value = 'ADD';
        }else{//SI ES MODIFICAR
            let titlePDF = 'titlefile' + itemNum;
            let idFileGral = 'idFile' + itemNum;
            let file = 'file' + itemNum;
            document.getElementById("titlePDF").value = document.getElementById(titlePDF).value;
            document.getElementById("idFileGral").value = document.getElementById(idFileGral).value;
            document.getElementById("itemFile").value = itemNum;
            //document.getElementById("fileUpTxt").value = file;
            document.getElementById("btnSubmitPDF").value = 'EDIT';
        };
        PDFModal.show(modalToggle);
    }

    function filechange(){
        let Element = document.getElementById('filePDF').files[0].name;
        if(Element != ''){
            document.getElementById("fileUpTxt").innerHTML = Element;
        };
    }

</script>

@endsection

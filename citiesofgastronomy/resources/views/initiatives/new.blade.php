<!-- resources/views/initiatives/new.blade.php -->

@extends('commons.admin_base')

@section('content')


<x-loading />


    <section id="admin_initiative_new">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    @if($id)
                    <h3 class="admin-title"><b>{{__('initiatives.edit.title')}}</b></h3>
                    @else
                    <h3 class="admin-title"><b>{{__('initiatives.create.title')}}</b></h3>
                    @endif
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3" id="initiativeForm" action="/admin/initiatives/store" method="POST">
                @csrf
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('initiatives.create.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control" value="{{$iniciative['name']}}" placeholder="{{__('initiatives.create.ph_name')}}"/>
                        <div id="data_name_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_continent">{{__('initiatives.create.data_continent')}}</label>
                        <select id="data_continent" name="data_continent" class="form-control" placeholder="">
                            <option value="">{{__('initiatives.create.ph_continent')}}</option>
                            @foreach($Continents as $Continent)
                            <option value="{{$Continent['id']}}" <?php if($iniciative['continent']==$Continent['id']){
                                echo 'selected';};?>>{{$Continent["name"]}}</option>
                            @endforeach
                        </select>
                        <div id="data_continent_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>



                    <div class="form-group py-2">
                        <label class="form-label" for="data_cities">{{__('initiatives.create.data_cities')}}</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="list-group" style="height: 300px;overflow: hidden;overflow-y: auto;">
                                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                                        Available cities
                                    </button>
                                    @foreach($citiesFilter AS $item)
                                    <?php $found_key = in_array($item['id'], array_column($iniciative['cities_filter'], 'filter'));?>
                                    <button type="button" id="cityAvaliable{{$item['id']}}" onclick="cityClick('{{$item['id']}}', 'add')"
                                         class="list-group-item list-group-item-action" style="display:<?php if($found_key){echo 'none'; }else{echo 'block';};?>">{{$item['name']}}</button>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="list-group" style="height: 300px;overflow: hidden;overflow-y: auto;">
                                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                                    Selected cities
                                    </button>
                                    @foreach($citiesFilter AS $item)
                                    <?php $found_key = in_array($item['id'], array_column($iniciative['cities_filter'], 'filter'));?>
                                    <button type="button" id="citySelect{{$item['id']}}" onclick="cityClick('{{$item['id']}}', 'del')"
                                         class="list-group-item list-group-item-action" style="display:<?php if($found_key){echo 'block';}else{echo 'none';};?>">{{$item['name']}}</button>
                                    @endforeach
                                </div>
                            </div>
                            <div style="display:none">
                            @foreach($citiesFilter AS $item)
                            <?php $found_key = in_array($item['id'], array_column($iniciative['cities_filter'], 'filter'));?>
                                    <input id="citiesFilter{{$item['id']}}" name="citiesFilter{{$item['id']}}" value="{{$item['id']}}"
                                    type="checkbox" aria-hidden="true" class="checkCities" <?php if($found_key){echo 'checked';};?>/>
                            @endforeach
                            <?php
                                $array = array_column($citiesFilter, 'id');
                                $valor =  implode(",", $array);
                                ?>
                                <input type="hidden" name="citiesFilterrIds" value="<?= $valor?>">
                            </div>
                        </div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_photo">{{__('initiatives.create.data_photo')}}</label>
                        <!--img obligatoria, si no existe imagen aún (solo aplica aquí)-->
                        <div class="my-3 w-25" id="phototbl" <?php  if(!$iniciative['photo']){echo 'style="display:none"';}?> >
                            <!--<div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/></div>-->
                            <img class="gallery-img w-100" src="<?php if($iniciative['photo']){echo config('app.url').$iniciative['photo'];}?>" id="imgFile"/>
                        </div>
                        <div class="p-2">
                            <label class="custom-file-upload btn btn-primary position-relative" for="initiative_photo">
                                <input type="file" class="inputImage" name="photo" id="photo"
                                        onChange="sel_file('imgFile', 'photo', 'phototbl', 'block')">
                                <?php if($iniciative['photo']){ echo __('cities.edit.btn_image');}else{echo 'SELECT IMAGE';};?>
                            </label>
                        </div>
                        <div id="photo_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="row mx-0 py-2">
                        <div class="col-12 px-0 my-2">
                            <p class="section-title"><b>{{__('initiatives.create.section_about')}}</b></p>
                        </div>

                        <div class="row py-2">
                            <div class="col-12 px-0 my-2">
                                <p class="form-label"><b>{{__('initiatives.create.data_acttype')}}</b></p>
                            </div>
                            <div class="row form-group py-2">
                                @foreach($typeOfActivityFilter AS $item)

                                <?php $found_key = in_array($item['id'], array_column($iniciative['type_filter'], 'filter'));?>

                                <div class="col-6">
                                    <input  name="typeOfActivityFilter{{$item['id']}}" class="checkType" type="checkbox"
                                            value="{{$item['id']}}" aria-hidden="true" <?php if($found_key){echo 'checked';};?> />
                                    <label for="data_sample_acttype_1">{{$item["name"]}} <b>({{$item['id']}})</b> </label>
                                </div>
                                @endforeach

                                <?php
                                $array = array_column($typeOfActivityFilter, 'id');
                                $valor =  implode(",", $array);
                                ?>
                                <input type="hidden" name="typeOfActivityFilterIds" value="<?= $valor?>">
                            </div>
                        </div>
                        <div class="bb-gray mt-4 mb-2"></div>
                        <div class="row py-2">
                            <div class="col-12 px-0 my-2">
                                <p class="form-label"><b>{{__('initiatives.create.data_topics')}}</b></p>
                            </div>
                            <div class="row form-group py-2">

                                @foreach($TopicsFilter AS $item)
                                <?php $found_key = in_array($item['id'], array_column($iniciative['topics_filter'], 'filter'));?>
                                <div class="col-6">
                                    <input name="topicsFilter{{$item['id']}}" class="checkTopics" value="{{$item['id']}}"
                                            type="checkbox" aria-hidden="true"  <?php if($found_key){echo 'checked';};?>/>
                                    <label for="data_sample_acttype_1">{{$item["name"]}}</label>
                                </div>
                                @endforeach
                                <?php
                                $array = array_column($TopicsFilter, 'id');
                                $valor =  implode(",", $array);
                                ?>
                                <input type="hidden" name="TopicsFilterIds" value="<?= $valor?>">

                            </div>
                        </div>
                        <div class="bb-gray mt-4 mb-2"></div>
                        <div class="row py-2">
                            <div class="col-12 px-0 my-2">
                                <p class="form-label"><b>{{__('initiatives.create.data_connections')}}</b></p>
                            </div>
                            <div class="row form-group py-2">
                                @foreach($ConnectionsToOtherFilter AS $item)
                                <?php $found_key = in_array($item['id'], array_column($iniciative['conections_filter'], 'filter'));?>
                                <div class="col-6">
                                    <input id="connectionsToOtherFilter{{$item['id']}}"  name="connectionsToOtherFilter{{$item['id']}}"
                                            value="{{$item['id']}}" type="checkbox" class="checkConnections" aria-hidden="true"
                                            <?php if($found_key){echo 'checked';};?>/>
                                    <label for="data_sample_topic_1">{{$item["name"]}}</label>
                                </div>
                                @endforeach
                                <?php
                                $array = array_column($ConnectionsToOtherFilter, 'id');
                                $valor =  implode(",", $array);
                                ?>
                                <input type="hidden" name="ConnectionsToOtherFilterIds" value="<?= $valor?>">
                            </div>
                        </div>
                        <div class="bb-gray mt-4 mb-2"></div>
                        <div class="row py-2">
                            <div class="col-12 px-0 my-2">
                                <p class="form-label"><b>{{__('initiatives.create.data_sdg')}}</b></p>
                            </div>
                            <div class="row form-group py-2">
                            @foreach($sdgFilter AS $item)
                                <?php $found_key = in_array($item['id'], array_column($iniciative['sdg_filter'], 'filter'));?>
                                <div class="col-6">
                                    <input id="sdgFilter{{$item['id']}}" name="sdgFilter{{$item['id']}}" class="checkSDG"
                                            value="{{$item['id']}}" type="checkbox" aria-hidden="true"  <?php if($found_key){echo 'checked';};?>/>
                                    <label for="data_sample_sdg_{{$item['id']}}">
                                        <img class="m-2" src="{{asset('assets/img/number/'.$item['number'].'.png')}}" width="25" height="25"/>
                                            {{$item["name"]}}
                                        </label>
                                </div>
                                @endforeach
                                <?php
                                $array = array_column($sdgFilter, 'id');
                                $valor =  implode(",", $array);
                                ?>
                                <input type="hidden" name="sdgFilterIds" value="<?= $valor?>">

                            </div>
                        </div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>
                    <div class="row m-0 p-0">
                        <div class="col-6 form-group py-2 ps-0">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="data_startdate">{{__('initiatives.create.data_startdate')}}</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_startdate" name="data_startdate" class="form-control" type="date"
                                    value="{{$iniciative['startDate']}}" placeholder="{{__('initiatives.create.ph_startdate')}}"/>
                                    <div id="data_startdate_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 form-group py-2 pe-0">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="data_enddate">{{__('initiatives.create.data_enddate')}}</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_enddate" name="data_enddate" class="form-control"  type="date"
                                    value="{{$iniciative['endDate']}}"  placeholder="{{__('initiatives.create.ph_enddate')}}"/>
                                    <div id="data_enddate_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                                    <div id="validation_dateCompare" class="invalid-feedback" style="display: none;">Please select an End Date equal or after the Start Date</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('initiatives.edit.data_description')}}</label>
                        <textarea id="data_description" name="data_description" class="form-control">{{$iniciative['description']}}</textarea>
                        <div id="data_description_validation" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>


                    <div class="form-group row py-2">
                        <p class="form-label"><b>{{__('initiatives.edit.section_gallery')}}</b></p>
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
                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group py-2">
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
                        <div class="col-auto ms-auto"><a href="{{route('admin.initiatives')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button id="btnSubmit" class="btn btn-primary w-100">
                        @if($id)
                            {{__('admin.btn_edit')}}
                        @else
                            {{__('admin.btn_create')}}
                        @endif
                        </buttton></div>
                    </div>
                </form>
            </div>
        </div>
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
<div class="modal fade" id="uploadLinkModal" tabindex="-1" aria-labelledby="uploadLinkModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
<div class="modal fade" tabindex="-1" id="uploadPDFModal" aria-labelledby="uploadPDFModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
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
            <input type="hidden" id="idSection" name="idSection" value="7">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_pdf_name">{{__('cities.edit.data_pdf_name')}}</label>
                <input id="titlePDF" name="titlePDF" class="form-control" placeholder="{{__('cities.edit.ph_pdf_name')}}"/>
                <div id="validation_PDFtitle" class="invalid-feedback" style="display: none;">{{__('admin.obligatory_field')}}</div>
            </div>
            <div class="py-2 row mx-0">
                <p class="form-label px-0" for="new_city_img">{{__('cities.edit.data_pdf')}}</p>
                <div class="col-12 p-2 h-100 row mx-0 align-items-center text-center load-file">
                    <label class="custom-file-upload btn btn-dark position-relative" for="new_gallery_img" style="width: 150px">
                        <input type="file" id="filePDF" name="filePDF" class="inputImage" onchange="filechange()">
                        <img class="mx-auto" src="{{asset('assets/icons/file.svg')}}" id="fileUpImg" width="20" height="24"/>
                    </label>
                    <div id="fileUpTxt" class="fw-lighter font-size-sm text-dark text-start p-0"></div>
                <div id="validation_PDF" class="invalid-feedback text-start" style="display: none;">{{__('admin.obligatory_field')}}</div>
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

var editor = CKEDITOR.replace( 'data_description' );

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



function saveLink(){
    let cantidad = document.getElementById("cant_links").value;
    cant_links = parseInt(cantidad);

    let nuevovalor = cant_links + 1;

    let dataLinkName = document.getElementById("data_link_name").value;
    let dataLink = document.getElementById("data_link").value;
    let idLinkGral = document.getElementById("idLinkGral").value;

    //si no hay nombre agrego el link en el nombre
    if(dataLinkName==''){
        dataLinkName = dataLink;
    };


    if(dataLink!=''){
            if(idLinkGral == ''){
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
                let id1 = 'titleLink' +idLinkGral;
                document.getElementById(id1).value = dataLinkName;
                id1 = 'link' +idLinkGral;
                document.getElementById(id1).value = dataLink;
            };
            LinkModal.hide(linkModalToggle);
    }else{
        let message = "fill out all the data";
        /*if(dataLinkName==''){
            document.getElementById("data_link_name").className = 'form-control is-invalid';
            //document.getElementById('validation_LinkTitle').style.display = 'block';
        };//*/
        if(dataLink==''){
            document.getElementById("data_link").className = 'form-control is-invalid';
            //document.getElementById('validation_Link').style.display = 'block';
        };
        alert(message);
    }
}

function editLinkFN(id){
    LinkModal.show(linkModalToggle);
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
        if(idFileGral != '' && title != ''){   $valida = 'si'; };
        if(idFileGral == '' && filePDF != '' && title != ''){   $valida = 'si'; };

        ///////////DESCIPTION
        //let description = editor.getData();

        //VERIFICO extencion
        file1 = document.getElementById("filePDF").value;
        let extencion = file1.split('.').pop();
        if(extencion!='pdf'){$valida = 'no';};

        if($valida == 'si'){
            //let formData = new FormData(document.getElementById("initiativeForm"));
            //formData.append("dato", "valor");
            //addFile(e["datta"]["id"], e["datta"]["title"], e["datta"]["file"]);
            //PDFModal.hide(modalToggle);
           // document.getElementById("loading").style.display = 'none';

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
                        if(!idFileGral){
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
                //*/

        }else{
            let message = "fill out all the data";
                        document.getElementById("loading").style.display = 'none';
                        if(title==''){
                            document.getElementById("titlePDF").className = 'form-control is-invalid';
                            document.getElementById('validation_PDFtitle').style.display = 'block';
                        };
                        if(filePDF==''){
                            document.getElementById('validation_PDF').style.display = 'block';
                        }else if(extencion!='pdf'){
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
</script>

<script>
    function cityClick(id, action){
        let idAvaliable = 'cityAvaliable'+id;
        let idSelect = 'citySelect'+id;
        let idCheckbox = 'citiesFilter'+id;

        let st1 = 'none';let st2 = 'block';let st3 = true;
        if(action == 'del'){
            st1 = 'block'; st2 = 'none'; st3 = false;
        };
        document.getElementById(idAvaliable).style.display = st1;
        document.getElementById(idSelect).style.display = st2;
        document.getElementById(idCheckbox).checked = st3;
    }


</script>

<script>




function searchCheck (classGroup){
    let result = true;
    //let array1 = document.getElementsByClassName(classGroup);
    let found = Array.from(document.getElementsByClassName(classGroup)).find((element) => element.checked == true);
    //let found = array1.find((element) => element.checked == true);
    if(found == undefined){result = false;};
    return result;
}





    $("#initiativeForm").on('submit', function(e){
        e.preventDefault();
        document.getElementById("btnSubmit").disabled = true;
        let id = '<?= $id?>';
        let data_name = document.getElementById("data_name").value;
        let data_continent = document.getElementById("data_continent").value;
        let photo = document.getElementById("photo").value;
        let data_startdate = document.getElementById("data_startdate").value;
        let data_enddate = document.getElementById("data_enddate").value;
        //let data_description = document.getElementById("data_description").value;
        //let data_startdate = document.getElementById("data_startdate").value;
        //let data_enddate = document.getElementById("data_enddate").value;
        let valida = 'si';let errorMessage = '';

        let data_description  = editor.getData();//document.getElementById("data_description").value;

        //reseteo validaciones

        document.getElementById("data_name").className =  'form-control';
                document.getElementById("data_name_validation").style.display =  'none';
                document.getElementById("data_continent").className =  'form-control';
                document.getElementById("data_continent_validation").style.display =  'none';
                //document.getElementById("photo").className =  'form-control';
                document.getElementById("photo_validation").style.display =  'none';
                document.getElementById("data_startdate").className =  'form-control';
                document.getElementById("data_startdate_validation").style.display =  'none';
                document.getElementById("data_enddate").className =  'form-control';
                document.getElementById("data_enddate_validation").style.display =  'none';
                document.getElementById("validation_dateCompare").style.display =  'none';
                document.getElementById("data_description").className =  'form-control';
                document.getElementById("data_description_validation").style.display =  'none';

                //comparar fechas
        if(data_startdate && data_enddate){
            var f1 = new Date(data_startdate);
            var f2 = new Date(data_enddate);

            if(f1 > f2){
                document.getElementById("validation_dateCompare").style.display = 'block';
                valida = 'no';
            };
        };

        //FILTROS
        let checkCities = searchCheck ('checkCities');
        let checkType = searchCheck ('checkType');
        let checkTopics = searchCheck ('checkTopics');
        let checkSDG = searchCheck ('checkSDG');
        let checkConnections = searchCheck ('checkConnections');
        if(!checkCities || !checkType || !checkTopics ){
        //if(!checkCities || !checkType || !checkTopics || !checkSDG || !checkConnections){
            valida = 'no';
        };

        //general DATTA
        if(data_name=='' || data_continent=='' || data_startdate=='' || data_enddate=='' || data_description=='' ){
            valida = 'no';
        };

        if(photo=='' && id==''){
            valida = 'no';
        };

        if(valida == 'si'){

            let datos = new FormData(this);
            datos.append('data_description', data_description);
            datos.append('id', id);

            $.ajax({
                type: 'POST',
                url: '/admin/initiatives/store',
                data: datos,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){
                    //$('.submitBtn').attr("disabled","disabled");
                    //$('#fupForm').css("opacity",".5");
                },
                success: function(msg){
                    let e = JSON.parse(msg);
                    //let e = JSON.parse(msg);
                    if(e.status=='200'){
                        <?php if($id){?>
                            localStorage.setItem('messageIniciative', e.message);
                        <?php }else{?>
                            localStorage.setItem('messageIniciative', e.message);
                        <?php };?>
                    }
                    else if(e.status===401){
                        alert("Error: " + e.message);
                        window.location = '/login';
                    }else{
                            localStorage.setItem('errorIessageIniciative', e.message);
                    };
                    window.location ='/admin/initiatives?section=in&page=1';
                    document.getElementById("btnSubmit").disabled = false;

                }
            });
            //*/
            //alert("Iniciative was successfully saved");

        }else{
            //checa FILTROS
            let cantFiltros = 0;let txt = 'is';
            if(!checkCities || !checkType || !checkTopics){
            //if(!checkCities || !checkType || !checkTopics || !checkSDG || !checkConnections){
                if(!checkCities){
                    errorMessage = 'cities';
                    cantFiltros = cantFiltros + 1;
                };
                if(!checkType){
                    if(errorMessage != ''){errorMessage = errorMessage+', ';};
                    errorMessage = errorMessage+'type of activity';
                    cantFiltros = cantFiltros + 1;
                };
                if(!checkTopics){
                    if(errorMessage != ''){errorMessage = errorMessage+', ';};
                    errorMessage = errorMessage+'topics';
                    cantFiltros = cantFiltros + 1;
                };
                /*
                if(!checkSDG){
                    if(errorMessage != ''){errorMessage = errorMessage+', ';};
                    errorMessage = errorMessage+'SDG';
                    cantFiltros = cantFiltros + 1;
                };
                if(!checkConnections){
                    if(errorMessage != ''){errorMessage = errorMessage+', ';};
                    errorMessage = errorMessage+'connection to other';
                    cantFiltros = cantFiltros + 1;
                };
                //*/
                if(cantFiltros>1){txt = 'are';};
                errorMessage = 'At least one filter of each must be selected ('+errorMessage+' '+txt+' missing)';

            };

            if(data_name=='' || data_continent=='' || (photo=='' && id=='') || data_startdate=='' || data_enddate=='' || data_description=='' ){
                    errorMessage = 'Fill out all fields. ' + errorMessage  ;
                if(data_name==''){
                    document.getElementById("data_name").className =  'form-control is-invalid';
                    document.getElementById("data_name_validation").style.display =  'block';
                };
                if(data_continent==''){
                    document.getElementById("data_continent").className =  'form-control is-invalid';
                    document.getElementById("data_continent_validation").style.display =  'block';
                };
                if(photo==''){
                    //document.getElementById("photo").className =  'form-control is-invalid';
                    document.getElementById("photo_validation").style.display =  'block';
                };
                if(data_startdate==''){
                    document.getElementById("data_startdate").className =  'form-control is-invalid';
                    document.getElementById("data_startdate_validation").style.display =  'block';
                };
                if(data_enddate==''){
                    document.getElementById("data_enddate").className =  'form-control is-invalid';
                    document.getElementById("data_enddate_validation").style.display =  'block';
                };
                if(data_description==''){
                    document.getElementById("data_description").className =  'form-control is-invalid';
                    document.getElementById("data_description_validation").style.display =  'block';
                }
            };

            if(data_startdate && data_enddate){
                if(f1 > f2){
                    document.getElementById("validation_dateCompare").style.display = 'block';
                    errorMessage = 'Please select an End Date equal or after the Start Date';
                };
            };

            alert(errorMessage);
        document.getElementById("btnSubmit").disabled = false;
        };
    });
</script>
@endsection

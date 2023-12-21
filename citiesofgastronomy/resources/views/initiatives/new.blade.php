<!-- resources/views/initiatives/new.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_initiative_new">
        <div id="" class="container p-5">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('initiatives.create.title')}}</b></h3>
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3">
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('initiatives.create.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control" placeholder="{{__('initiatives.create.ph_name')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_continent">{{__('initiatives.create.data_continent')}}</label>
                        <select id="data_continent" name="data_continent" class="form-control" placeholder="">
                            <option>{{__('initiatives.create.ph_continent')}}</option>
                        </select>
                    </div>



                    <div class="form-group py-2">
                        <label class="form-label" for="data_cities">{{__('initiatives.create.data_cities')}}</label>
                        <div class="row">
                            <div class="col-6">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                                        The current button
                                    </button>
                                    <button type="button" class="list-group-item list-group-item-action">A second item</button>
                                    <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                                    <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active" aria-current="true">
                                        The current button
                                    </button>
                                    <button type="button" class="list-group-item list-group-item-action">A second item</button>
                                    <button type="button" class="list-group-item list-group-item-action">A third button item</button>
                                    <button type="button" class="list-group-item list-group-item-action">A fourth button item</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('initiatives.create.data_photo')}}</label>
                        <!--img obligatoria, si no existe imagen aún (solo aplica aquí)-->
                        <div class="my-3 w-25 load-img row mx-0">
                            <div class="row mx-0 align-items-center justify-content-center">
                                <div class="col-auto">
                                    <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>                                </div>
                            </div>
                        </div>
                        <!--si ya existe imagen (solo aplica aquí)-->
                        <div class="my-3 w-25">
                            <img class="gallery-img w-100" src="{{asset('storage/cities/sample.png')}}"/>
                        </div>
                        <!--independiente de lo anterior se conserva el botón de carga-->
                        <div class="p-2">
                            <label class="custom-file-upload btn btn-primary" for="city_logo">
                            {{__('cities.edit.btn_image')}}
                            </label>
                            <input type="file" class="text-center file-input" name="city_logo" id="city_logo">
                        </div> 
                        
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
                                <div class="col-6">
                                    <input id="data_sample_acttype_1" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_acttype_1">Best Practice</label>
                                </div>  
                                <div class="col-6">
                                    <input id="data_sample_acttype_2" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_acttype_2">Communication</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_sample_acttype_3" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_acttype_3">Cooperation Project</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_sample_acttype_4" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_acttype_4">Open Call</label>
                                </div>
                            </div>
                        </div>
                        <div class="bb-gray mt-4 mb-2"></div>
                        <div class="row py-2">
                            <div class="col-12 px-0 my-2">
                                <p class="form-label"><b>{{__('initiatives.create.data_topics')}}</b></p>
                            </div>
                            <div class="row form-group py-2">
                                <div class="col-6">
                                    <input id="data_sample_acttype_1" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_acttype_1">Academic | Scientific</label>
                                </div>  
                                <div class="col-6">
                                    <input id="data_sample_acttype_2" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_acttype_2">Tourism</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_sample_acttype_3" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_acttype_3">Education</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_sample_acttype_4" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_acttype_4">Cultural Identity</label>
                                </div>
                            </div>
                        </div>
                        <div class="bb-gray mt-4 mb-2"></div>
                        <div class="row py-2">
                            <div class="col-12 px-0 my-2">
                                <p class="form-label"><b>{{__('initiatives.create.data_connections')}}</b></p>
                            </div>
                            <div class="row form-group py-2">
                                <div class="col-6">
                                    <input id="data_sample_topic_1" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_topic_1">Craft & Folk Arts</label>
                                </div>  
                                <div class="col-6">
                                    <input id="data_sample_topic_2" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_topic_2">Design</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_sample_topic_3" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_topic_3">Film</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_sample_topic_4" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_topic_4">Literature</label>
                                </div>
                            </div>
                        </div>
                        <div class="bb-gray mt-4 mb-2"></div>
                        <div class="row py-2">
                            <div class="col-12 px-0 my-2">
                                <p class="form-label"><b>{{__('initiatives.create.data_sdg')}}</b></p>
                            </div>
                            <div class="row form-group py-2">
                                <div class="col-6">
                                    <input id="data_sample_sdg_1" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_sdg_1"><img class="m-2" src="{{asset('assets/img/number/1.png')}}" width="25" height="25"/>End poverty in all its forms everywhere.</label>
                                </div>  
                                <div class="col-6">
                                    <input id="data_sample_sdg_2" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_sdg_2"><img class="m-2" src="{{asset('assets/img/number/2.png')}}" width="25" height="25"/>Zero Hunger.</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_sample_sdg_3" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_sdg_3"><img class="m-2" src="{{asset('assets/img/number/3.png')}}" width="25" height="25"/>Ensure healthy lives and promote well-being for all at all ages.</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_sample_sdg_4" class="" type="checkbox" aria-hidden="true" />
                                    <label for="data_sample_sdg_4"><img class="m-2" src="{{asset('assets/img/number/4.png')}}" width="25" height="25"/>Quality education.</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>
                    <div class="row m-0 p-0">
                        <div class="col-6 form-group py-2 ps-0">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="data_startdate">{{__('about.timeline.data_startdate')}}</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_startdate" name="data_startdate" class="form-control" placeholder="{{__('about.timeline.ph_startdate')}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 form-group py-2 pe-0">
                            <div class="row">
                                <div class="col-6">
                                    <label class="form-label" for="data_enddate">{{__('about.timeline.data_enddate')}}</label>
                                </div>
                                <div class="col-6">
                                    <input id="data_enddate" name="data_enddate" class="form-control" placeholder="{{__('about.timeline.ph_enddate')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('cities.edit.data_description')}}</label>
                        <textarea id="data_description" name="data_description" class="form-control" placeholder="{{__('cities.edit.ph_description')}}"></textarea>
                    </div>
                    
                    <div class="bb-gray mt-4 mb-2"></div>


                    <div class="form-group row py-2">
                        <p class="form-label"><b>{{__('cities.edit.section_gallery')}}</b></p>
                        <div class="row py-2">
                            <div class="col-2 py-2 mx-2">
                                <div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/></div>
                                <img class="gallery-img w-100" src="{{asset('storage/cities/sample.png')}}"/>
                            </div>
                            <div class="col-2 py-2 mx-2">
                                <div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/></div>
                                <img class="gallery-img w-100" src="{{asset('storage/cities/sample.png')}}"/>
                            </div>
                            <div class="col-2 py-2 mx-2">
                                <div class="text-right"><img class="delete-img"src="{{asset('assets/icons/delete.png')}}"/></div>
                                <img class="gallery-img w-100" src="{{asset('storage/cities/sample.png')}}"/>
                            </div>
                            <div class="col-2 py-2 mx-2 row text-center">
                                <div class="col-12 p-2 load-img h-100 row mx-0 align-items-center">
                                    <label class="custom-file-upload" for="new_gallery_img">
                                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                                    </label>
                                    <input type="file" class="text-center file-input" name="new_gallery_img" id="new_gallery_img">
                                </div> 
                            </div>                        
                        </div>
                    </div>
                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group py-2">
                        <div class="row mx-0 align-items-center">
                            <!--si es link-->
                            <div class="col-10 px-0 py-2">
                                <input id="data_description" name="data_description" class="form-control" placeholder="{{__('cities.edit.ph_document')}}"/>
                            </div>
                            <div class="col-1 p-2 text-right hover-pointer"><img class="mx-auto" width="38" height="38" data-bs-toggle="modal" data-bs-target="#uploadLinkModal" src="{{asset('assets/icons/edit_file.png')}}"/></div>
                            <div class="col-1 p-2 text-left"><img class="mx-auto" width="38" height="38" src="{{asset('assets/icons/delete_file.png')}}"/></div>
                            <!--si es pdf-->
                            <div class="col-10 px-0 py-2">
                                <input id="data_description" name="data_description" class="form-control" placeholder="{{__('cities.edit.ph_document')}}"/>
                            </div>
                            <div class="col-1 p-2 text-right hover-pointer"><img class="mx-auto" width="38" height="38" data-bs-toggle="modal" data-bs-target="#uploadPDFModal"  src="{{asset('assets/icons/edit_file.png')}}"/></div>
                            <div class="col-1 p-2 text-left"><img class="mx-auto" width="38" height="38" src="{{asset('assets/icons/delete_file.png')}}"/></div>

                            <div class="col-12 px-0 py-2 row mx-0">
                                <div class="col-auto ps-0"><button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#uploadLinkModal">{{__('cities.edit.btn_link')}}</buttton></div>
                                <div class="col-auto"><button type="button" class="btn btn-dark w-100" data-bs-toggle="modal" data-bs-target="#uploadPDFModal">{{__('cities.edit.btn_pdf')}}</buttton></div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row form-group py-5">
                        <div class="col-auto ms-auto"><a href="{{route('admin.contact')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button class="btn btn-primary w-100">{{__('admin.btn_create')}}</buttton></div>
                    </div>
                </form>
            </div>
        </div>
    </section>


<!-- Modal UPLOAD LINK-->
<div class="modal fade" id="uploadLinkModal" tabindex="-1" aria-labelledby="uploadLinkModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="uploadLinkModalLabel">{{__('initiatives.create.upload_link_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_link_name">{{__('initiatives.create.data_link_name')}}</label>
                <input id="data_link_name" name="data_link_name" class="form-control" placeholder="{{__('initiatives.create.ph_link_name')}}"/>
            </div>
            <div class="form-group py-2">
                <label class="form-label" for="data_link">{{__('initiatives.create.data_link')}}</label>
                <input id="data_link" name="data_link" class="form-control" placeholder="{{__('initiatives.create.ph_link')}}"/>
            </div>
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-auto btn btn-primary mx-auto">{{__('admin.btn_add')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>
    <!-- Modal UPLOAD PDF-->
<div class="modal fade" id="uploadPDFModal" tabindex="-1" aria-labelledby="uploadPDFModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="uploadPDFModalLabel">{{__('initiatives.create.upload_pdf_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_pdf_name">{{__('initiatives.create.data_pdf_name')}}</label>
                <input id="data_pdf_name" name="data_pdf_name" class="form-control" placeholder="{{__('initiatives.create.ph_pdf_name')}}"/>
            </div>
            <div class="py-2 row mx-0">
                <p class="form-label px-0" for="new_city_img">{{__('initiatives.create.data_pdf')}}</p>
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



@endsection
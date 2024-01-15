<!-- resources/views/tours/new.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_tours_new">
        <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('tours.create.title')}}</b></h3>
                </div>
            </div>
            
            <div class="row mx-0">
                <form class="pb-5 my-3">
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tours.create.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control" placeholder="{{__('tours.create.ph_name')}}"/>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tours.create.data_photo')}}</label>
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
                            <label class="custom-file-upload btn btn-primary" for="recipe_photo">
                            {{__('tours.create.btn_image')}}
                            </label>
                            <input type="file" class="text-center file-input" name="recipe_photo" id="recipe_photo">
                        </div> 
                        
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_agency">{{__('tours.create.data_agency')}}</label>
                        <input id="data_agency" name="data_agency" class="form-control" placeholder="{{__('tours.create.ph_agency')}}"/>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_city">{{__('tours.create.data_city')}}</label>
                        <select id="data_city" name="data_city" class="form-control" placeholder="">
                            <option>{{__('tours.create.ph_city')}}</option>
                        </select>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('tours.create.data_description')}}</label>
                        <textarea id="data_description" name="data_description" class="form-control" placeholder="{{__('tours.create.ph_description')}}"></textarea>
                    </div>
                    
                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="row mx-0 py-2">
                        <div class="col-12 px-0 my-2">
                            <p class="section-title"><b>{{__('tours.create.section_socials')}}</b></p>
                        </div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="facebook_link">{{__('tours.create.data_facebook')}}</label>
                        <input id="facebook_link" name="facebook_link" class="form-control" placeholder="{{__('tours.create.ph_facebook')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="instagram_link">{{__('tours.create.data_instagram')}}</label>
                        <input id="instagram_link" name="instagram_link" class="form-control" placeholder="{{__('tours.create.ph_instagram')}}"/>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="tiktok_link">{{__('tours.create.data_tiktok')}}</label>
                        <input id="tiktok_link" name="tiktok_link" class="form-control" placeholder="{{__('tours.create.ph_tiktok')}}"/>
                    </div>
                    
                    <div class="form-group py-2">
                        <label class="form-label" for="youtube_link">{{__('tours.create.data_youtube')}}</label>
                        <input id="youtube_link" name="youtube_link" class="form-control" placeholder="{{__('tours.create.ph_youtube')}}"/>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group row py-2">
                        <p class="form-label"><b>{{__('tours.create.section_gallery')}}</b></p>
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

                    <div class="row form-group py-5">
                        <div class="col-auto ms-auto"><a href="{{route('admin.tours')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button class="btn btn-primary w-100">{{__('admin.btn_create')}}</buttton></div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
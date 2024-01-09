<!-- resources/views/tastier_life/edit_recipe.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_recipe_edit">
        <div id="" class="container p-5">
            <div class="row mx-0">
                <div class="col-12 px-0 py-2">
                    <h3 class="admin-title"><b>{{__('tastier_life.recipes.edit.title')}}</b></h3>
                </div>
            </div>
            <div class="row mx-0">
                <form class="pb-5 my-3">
                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tastier_life.recipes.edit.data_name')}}</label>
                        <input id="data_name" name="data_name" class="form-control" placeholder="{{__('tastier_life.recipes.edit.ph_name')}}"/>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_name">{{__('tastier_life.recipes.edit.data_photo')}}</label>
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
                            {{__('tastier_life.recipes.edit.btn_image')}}
                            </label>
                            <input type="file" class="text-center file-input" name="recipe_photo" id="recipe_photo">
                        </div> 
                        
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_description">{{__('tastier_life.recipes.edit.data_description')}}</label>
                        <textarea id="data_description" name="data_description" class="form-control" placeholder="{{__('tastier_life.recipes.edit.ph_description')}}"></textarea>
                    </div>
                    
                    <div class="form-group py-2">
                        <label class="form-label" for="data_chef">{{__('tastier_life.recipes.edit.data_chef')}}</label>
                        <select id="data_chef" name="data_chef" class="form-control" placeholder="">
                            <option>{{__('tastier_life.recipes.edit.ph_chef')}}</option>
                        </select>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_city">{{__('tastier_life.recipes.edit.data_city')}}</label>
                        <select id="data_city" name="data_city" class="form-control" placeholder="">
                            <option>{{__('tastier_life.recipes.edit.ph_city')}}</option>
                        </select>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_cat">{{__('tastier_life.recipes.edit.data_cat')}}</label>
                        <select id="data_cat" name="data_cat" class="form-control" placeholder="">
                            <option>{{__('tastier_life.recipes.edit.ph_cat')}}</option>
                        </select>
                    </div>
                    
                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="row mx-0 py-2">
                        <div class="col-12 px-0 my-2">
                            <p class="section-title"><b>{{__('initiatives.create.section_about')}}</b></p>
                        </div>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_difficulty">{{__('tastier_life.recipes.edit.data_difficulty')}}</label>
                        <input id="data_difficulty" name="data_difficulty" class="form-control" placeholder="{{__('tastier_life.recipes.edit.ph_difficulty')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_preptime">{{__('tastier_life.recipes.edit.data_preptime')}}</label>
                        <input id="data_preptime" name="data_preptime" class="form-control" placeholder="{{__('tastier_life.recipes.edit.ph_preptime')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_totaltime">{{__('tastier_life.recipes.edit.data_totaltime')}}</label>
                        <input id="data_totaltime" name="data_totaltime" class="form-control" placeholder="{{__('tastier_life.recipes.edit.ph_totaltime')}}"/>
                    </div>
                    <div class="form-group py-2">
                        <label class="form-label" for="data_servings">{{__('tastier_life.recipes.edit.data_servings')}}</label>
                        <input id="data_servings" name="data_servings" class="form-control" placeholder="{{__('tastier_life.recipes.edit.ph_servings')}}"/>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_ingredients">{{__('tastier_life.recipes.edit.data_ingredients')}}</label>
                        <textarea id="data_ingredients" name="data_ingredients" class="form-control" placeholder="{{__('tastier_life.recipes.edit.ph_ingredients')}}"></textarea>
                    </div>

                    <div class="form-group py-2">
                        <label class="form-label" for="data_preparations">{{__('tastier_life.recipes.edit.data_preparations')}}</label>
                        <textarea id="data_preparations" name="data_preparations" class="form-control" placeholder="{{__('tastier_life.recipes.edit.ph_preparations')}}"></textarea>
                    </div>

                    <div class="bb-gray mt-4 mb-2"></div>

                    <div class="form-group row py-2">
                        <p class="form-label"><b>{{__('tastier_life.recipes.edit.section_gallery')}}</b></p>
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
                        <div class="col-auto ms-auto"><a href="{{route('admin.tastier_life')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                        <div class="col-auto me-auto"><button class="btn btn-primary w-100">{{__('admin.btn_edit')}}</buttton></div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
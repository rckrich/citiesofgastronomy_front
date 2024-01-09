<!-- resources/views/admin/home.blade.php -->

@extends('commons.admin_base')

@section('content')
    <section id="admin_tastierlife">
    <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-tastierlife" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-recipes-tab" data-bs-toggle="pill" data-bs-target="#pills-recipes" type="button" role="tab" aria-controls="pills-recipes" aria-selected="true">{{__('tastier_life.recipes.title')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-chefs-tab" data-bs-toggle="pill" data-bs-target="#pills-chefs" type="button" role="tab" aria-controls="pills-chefs" aria-selected="false">{{__('tastier_life.chefs.title')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-categories-tab" data-bs-toggle="pill" data-bs-target="#pills-categories" type="button" role="tab" aria-controls="pills-categories" aria-selected="false">{{__('tastier_life.categories.title')}}</button>
        </li>
    </ul>
    <div class="tab-content px-5" id="pills-tab-tastierlifeContent">
        <div class="tab-pane fade show active" id="pills-recipes" role="tabpanel" aria-labelledby="pills-recipes-tab">
            <div id="" class="container p-5">
                <div class="row mx-0">
                    <div class="col-12 px-0 py-2">
                        <h3 class="admin-title"><b class="text-gray">{{__('tastier_life.recipes.admin_title_1')}}</b><b>{{__('tastier_life.recipes.admin_title_2')}}</b></h3>
                    </div>
                    <div class="col-12 px-0 text-right row mx-0 py-2">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                            <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('tastier_life.recipes.search_ph')}}" aria-label="{{__('tastier_life.recipes.search_ph')}}" aria-describedby="basic-addon1">
                        </div>
                        </div>
                    </div>
                    <div class="row col-12 px-0 py-2">
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <a class="btn btn-primary mx-auto" href="{{route('admin.recipe_new')}}">{{__('tastier_life.recipes.btn_add')}}</a>
                        </div>
                    </div>
                </div>
                <div class="row mx-0 pt-4">
                    <table class="table table-fixed">
                        <thead class="">
                            <tr>
                                <th class="col-4">{{__('tastier_life.recipes.th_name')}}</th>
                                <th class="col-2">{{__('tastier_life.recipes.th_chef')}}</th>
                                <th class="col-2">{{__('tastier_life.recipes.th_city')}}</th>
                                <th class="col-2">{{__('tastier_life.recipes.th_category')}}</th>
                                <th class="col-auto"></th>
                                <th class="col-auto"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="align-items-center">
                                <td class="col-4">Name of the Recipe</td>
                                <td class="col-2">Chef</td>
                                <td class="col-2">City</td>
                                <td class="col-2">Category</td>
                                <td class="col-auto my-auto">
                                    <a class="btn btn-link" href="{{route('admin.recipe_edit',['id'=>1])}}">{{__('tastier_life.btn_edit')}}</a>
                                </td>                            
                                <td class="col-auto my-auto">
                                    <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteRecipeModal">{{__('admin.btn_delete')}}
                                </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-chefs" role="tabpanel" aria-labelledby="pills-chefs-tab">
            <div id="" class="container p-5">
                <div class="row mx-0">
                    <div class="col-12 px-0 py-2">
                        <h3 class="admin-title"><b class="text-gray">{{__('tastier_life.chefs.admin_title_1')}}</b><b>{{__('tastier_life.chefs.admin_title_2')}}</b></h3>
                    </div>
                    <div class="col-12 px-0 text-right row mx-0 py-2">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                            <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('tastier_life.chefs.search_ph')}}" aria-label="{{__('tastier_life.chefs.search_ph')}}" aria-describedby="basic-addon1">
                        </div>
                        </div>
                    </div>
                    <div class="row col-12 px-0 py-2">
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <a class="btn btn-primary mx-auto" href="{{route('admin.chef_new')}}">{{__('tastier_life.chefs.btn_add')}}</a>
                        </div>
                    </div>
                </div>
                <div class="row mx-0 pt-4">
                    <table class="table table-fixed">
                        <thead class="">
                            <tr>
                                <th class="col-8">{{__('tastier_life.chefs.th_name')}}</th>
                                <th class="col-auto"></th>
                                <th class="col-auto"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="align-items-center">
                                <td class="col-8">Name of the Chef</td>
                                <td class="col-auto my-auto">
                                    <a class="btn btn-link" href="{{route('admin.chef_edit',['id'=>1])}}">{{__('tastier_life.btn_edit')}}</a>
                                </td>                            
                                <td class="col-auto my-auto">
                                    <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteChefModal">{{__('admin.btn_delete')}}
                                </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-categories" role="tabpanel" aria-labelledby="pills-categories-tab">
            <div id="" class="container p-5">
                <div class="row mx-0">
                    <div class="col-12 px-0 py-2">
                        <h3 class="admin-title"><b class="text-gray">{{__('tastier_life.categories.admin_title_1')}}</b><b>{{__('tastier_life.categories.admin_title_2')}}</b></h3>
                    </div>
                    <div class="col-12 px-0 text-right row mx-0 py-2">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                            <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('tastier_life.categories.search_ph')}}" aria-label="{{__('tastier_life.categories.search_ph')}}" aria-describedby="basic-addon1">
                        </div>
                        </div>
                    </div>
                    <div class="row col-12 px-0 py-2">
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <a class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#editCategoryModal">{{__('tastier_life.categories.btn_add')}}</a>
                        </div>
                    </div>
                </div>
                <div class="row mx-0 pt-4">
                    <table class="table table-fixed">
                        <thead class="">
                            <tr>
                                <th class="col-8">{{__('tastier_life.categories.th_name')}}</th>
                                <th class="col-auto"></th>
                                <th class="col-auto"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <tr class="align-items-center">
                                <td class="col-8">Category</td>
                                <td class="col-auto my-auto">
                                    <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#editCategoryModal">{{__('tastier_life.btn_edit')}}</button>
                                </td>                            
                                <td class="col-auto my-auto">
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">{{__('admin.btn_delete')}}
                                </button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </section>


    <!-- Modal DELETE RECIPE-->
<div class="modal fade" id="deleteRecipeModal" tabindex="-1" aria-labelledby="deleteRecipeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteRecipeModalLabel">{{__('tastier_life.recipes.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('tastier_life.recipes.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>
    <!-- Modal DELETE CHEF-->
<div class="modal fade" id="deleteChefModal" tabindex="-1" aria-labelledby="deleteChefModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteChefModalLabel">{{__('tastier_life.chefs.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('tastier_life.chefs.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal CREATE/EDIT CATEGORY-->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header b-none px-4">
            <h5 class="modal-title" id="createCategoryModalLabel">{{__('tastier_life.categories.create_modal_title')}}</h5>
            <h5 class="modal-title" id="editCategoryModalLabel">{{__('tastier_life.categories.edit_modal_title')}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>            
        <form class="">
        <div class="modal-body px-4">
            <div class="form-group py-2">
                <label class="form-label" for="data_title">{{__('tastier_life.categories.data_title')}}</label>
                <input id="data_title" name="data_title" class="form-control" placeholder="{{__('tastier_life.categories.ph_title')}}"/>
            </div>   
        </div>
        <div class="modal-footer b-none row mx-0">
            <button type="button" class="col-4 btn btn-outline-primary ms-auto" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</buttton>
            <button type="button" class="col-4 btn btn-primary me-auto">{{__('admin.btn_create')}}</buttton>
        </div>
        </form>
    </div>
  </div>
</div>

    <!-- Modal DELETE CATEGORY-->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCategoryModalLabel">{{__('tastier_life.categories.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('tastier_life.categories.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>


@endsection
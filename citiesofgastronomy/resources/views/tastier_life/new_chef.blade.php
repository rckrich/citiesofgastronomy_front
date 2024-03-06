<!-- resources/views/tastier_life/new_chef.blade.php -->

@extends('commons.admin_base')

@section('content')
<section id="admin_chef_new">
    <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
        <div class="row mx-0">
            <div class="col-12 px-0 py-2">
                @if($id)
                <h3 class="admin-title"><b>{{__('tastier_life.chefs.edit_title')}}</b></h3>
                @else
                <h3 class="admin-title"><b>{{__('tastier_life.chefs.create_title')}}</b></h3>
                @endif
            </div>
        </div>
        <div class="row mx-0">
            <form class="pb-5 my-3" action="/admin/tastier_life/chef/store" method="POST" id="chefForm">
                @csrf
                <input type="hidden" id="id" name="id" value="<?= $id?>">
                <div class="form-group py-2">
                    <label class="form-label" for="data_name">{{__('tastier_life.chefs.data_name')}}</label>
                    <input id="data_name" name="data_name" class="form-control" value="<?= $data_name?>" placeholder="{{__('tastier_life.chefs.ph_name')}}"/>
                    <div id="validation_name" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
                </div>
                <div class="col-12 px-0 my-2">
                    <p class="admin-subtitle"><b>{{__('tastier_life.chefs.section_socials')}}</b></p>
                </div>
                <div class="form-group py-2">
                    <label class="form-label" for="facebook_link">{{__('tastier_life.chefs.data_facebook')}}</label>
                    <input id="facebook_link" name="facebook_link" class="form-control" value="<?= $facebook_link?>" placeholder="{{__('tastier_life.chefs.ph_facebook')}}"/>
                </div>
                <div class="form-group py-2">
                    <label class="form-label" for="twitter_link">{{__('tastier_life.chefs.data_twitter')}}</label>
                    <input id="twitter_link" name="twitter_link" class="form-control" value="<?= $twitter_link?>" placeholder="{{__('tastier_life.chefs.ph_twitter')}}"/>
                </div>
                <div class="form-group py-2">
                    <label class="form-label" for="linkedin_link">{{__('tastier_life.chefs.data_linkedin')}}</label>
                    <input id="linkedin_link" name="linkedin_link" class="form-control" value="<?= $linkedin_link?>" placeholder="{{__('tastier_life.chefs.ph_linkedin')}}"/>
                </div>
                <div class="form-group py-2">
                    <label class="form-label" for="instagram_link">{{__('tastier_life.chefs.data_instagram')}}</label>
                    <input id="instagram_link" name="instagram_link" class="form-control" value="<?= $instagram_link?>" placeholder="{{__('tastier_life.chefs.ph_instagram')}}"/>
                </div>
                <div class="form-group py-2">
                    <label class="form-label" for="tiktok_link">{{__('tastier_life.chefs.data_tiktok')}}</label>
                    <input id="tiktok_link" name="tiktok_link" class="form-control" value="<?= $tiktok_link?>" placeholder="{{__('tastier_life.chefs.ph_tiktok')}}"/>
                </div>
                <div class="form-group py-2">
                    <label class="form-label" for="youtube_link">{{__('tastier_life.chefs.data_youtube')}}</label>
                    <input id="youtube_link" name="youtube_link" class="form-control" value="<?= $youtube_link?>" placeholder="{{__('tastier_life.chefs.ph_youtube')}}"/>
                </div>
                <div class="row form-group py-5">
                    <div class="col-auto ms-auto"><a href="{{route('admin.tastier_life.chefs')}}" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                    
                    <div class="col-auto me-auto">
                        <span class="btn btn-primary w-100" onclick="saveChef()">@if($id){{__('admin.btn_edit')}}@else{{__('admin.btn_create')}} @endif</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    function saveChef(){
        let data_name = document.getElementById("data_name").value;
        let facebook_link = document.getElementById("facebook_link").value;
        let twitter_link = document.getElementById("twitter_link").value;
        let linkedin_link = document.getElementById("linkedin_link").value;
        let instagram_link = document.getElementById("instagram_link").value;
        let tiktok_link = document.getElementById("tiktok_link").value;
        let youtube_link = document.getElementById("youtube_link").value;

        document.getElementById("validation_name").style.display = 'none';

        if(data_name){
            <?php if($id){?>
            localStorage.setItem('tastierLifeMessage', "{{trans('tastier_life.chefs.edit_success')}}");
            <?php }else{?>
            localStorage.setItem('tastierLifeMessage', "{{trans('tastier_life.chefs.create_success')}}");
            <?php };?>
            let form = document.getElementById('chefForm');
            form.submit();
        }else{
            if(!data_name){document.getElementById("validation_name").style.display = 'block';};
        };
    }
    
</script>
@endsection
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
                    <input type="text" id="data_name" name="data_name" class="form-control" value="<?= $data_name?>" placeholder="{{__('tastier_life.chefs.ph_name')}}"/>
                    <div id="validation_name" class="invalid-feedback">{{__('admin.obligatory_field')}}</div>
                </div>
                <div class="col-12 px-0 my-2">
                    <p class="admin-subtitle"><b>{{__('tastier_life.chefs.section_socials')}}</b></p>
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
                <div class="row form-group py-5">
                    <div class="col-auto ms-auto"><a href="{{route('admin.tastier_life')}}?section=chefs&pageChef=1" class="btn btn-dark w-100">{{__('admin.btn_cancel')}}</a></div>
                    
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

        let is_valid_name = false; //only name is mandatory
        let is_valid_facebook = true;
        let is_valid_twitter = true;
        let is_valid_linkedin = true;
        let is_valid_instagram = true;
        let is_valid_tiktok = true;
        let is_valid_youtube = true;

        document.getElementById("validation_name").style.display = 'none';
        document.getElementById("validation_facebook").style.display = 'none';
        document.getElementById("validation_twitter").style.display = 'none';
        document.getElementById("validation_linkedin").style.display = 'none';
        document.getElementById("validation_instagram").style.display = 'none';
        document.getElementById("validation_tiktok").style.display = 'none';
        document.getElementById("validation_youtube").style.display = 'none';


        if(data_name){is_valid_name = true;}
        if(facebook_link && !isValidUrl(facebook_link)){is_valid_facebook = false;}//if empty or valid url, continues as true
        if(twitter_link && !isValidUrl(twitter_link)){is_valid_twitter = false;}
        if(linkedin_link && !isValidUrl(linkedin_link)){is_valid_linkedin = false;}
        if(instagram_link && !isValidUrl(instagram_link)){is_valid_instagram = false;}
        if(tiktok_link && !isValidUrl(tiktok_link)){is_valid_tiktok = false;}
        if(youtube_link && !isValidUrl(youtube_link)){is_valid_youtube = false;}

        if(is_valid_name && is_valid_facebook && is_valid_twitter 
        && is_valid_linkedin && is_valid_instagram && is_valid_tiktok && is_valid_youtube){
            <?php if($id){?>
            localStorage.setItem('tastierLifeMessage', "{{trans('tastier_life.chefs.edit_success')}}");
            <?php }else{?>
            localStorage.setItem('tastierLifeMessage', "{{trans('tastier_life.chefs.create_success')}}");
            <?php };?>
            let form = document.getElementById('chefForm');
            form.submit();
        }else{
            if(!is_valid_name){document.getElementById("validation_name").style.display = 'block';}
            if(!is_valid_facebook){document.getElementById("validation_facebook").style.display = 'block';}
            if(!is_valid_twitter){document.getElementById("validation_twitter").style.display = 'block';}
            if(!is_valid_linkedin){document.getElementById("validation_linkedin").style.display = 'block';}
            if(!is_valid_instagram){document.getElementById("validation_instagram").style.display = 'block';}
            if(!is_valid_tiktok){document.getElementById("validation_tiktok").style.display = 'block';}
            if(!is_valid_youtube){document.getElementById("validation_youtube").style.display = 'block';}
        }
        
    }
    
</script>
@endsection
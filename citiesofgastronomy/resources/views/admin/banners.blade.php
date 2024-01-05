@csrf
<ul class="nav nav-pills mb-3 py-2" id="pills-tab-banner" role="tablist">
  <li class="nav-item py-2 px-3" role="presentation">
    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
    aria-controls="pills-home" aria-selected="true">
        {{__('admin.main_site.banners.home.tab_name')}}
    </button>
  </li>
  <li class="nav-item py-2 px-3" role="presentation">
    <button class="nav-link" id="pills-cities-tab" data-bs-toggle="pill" data-bs-target="#pills-cities" type="button" role="tab"
    aria-controls="pills-cities" aria-selected="true">
        {{__('admin.main_site.banners.cities.tab_name')}}
    </button>
  </li>
  <li class="nav-item py-2 px-3" role="presentation">
    <button class="nav-link" id="pills-about-tab" data-bs-toggle="pill" data-bs-target="#pills-about" type="button" role="tab"
    aria-controls="pills-about" aria-selected="true">
        {{__('admin.main_site.banners.about.tab_name')}}
    </button>
  </li>
  <li class="nav-item py-2 px-3" role="presentation">
    <button class="nav-link" id="pills-initiatives-tab" data-bs-toggle="pill" data-bs-target="#pills-initiatives" type="button" role="tab"
    aria-controls="pills-initiatives" aria-selected="true">
        {{__('admin.main_site.banners.initiatives.tab_name')}}
    </button>
  </li>
  <li class="nav-item py-2 px-3" role="presentation">
    <button class="nav-link" id="pills-tastier_life-tab" data-bs-toggle="pill" data-bs-target="#pills-tastier_life" type="button" role="tab"
    aria-controls="pills-tastier_life" aria-selected="true">
        {{__('admin.main_site.banners.tastier_life.tab_name')}}
    </button>
  </li>
  <li class="nav-item py-2 px-3" role="presentation">
    <button class="nav-link" id="pills-tours-tab" data-bs-toggle="pill" data-bs-target="#pills-tours" type="button" role="tab"
    aria-controls="pills-tours" aria-selected="true">
        {{__('admin.main_site.banners.tours.tab_name')}}
    </button>
  </li>
  <li class="nav-item py-2 px-3" role="presentation">
    <button class="nav-link" id="pills-calendar-tab" data-bs-toggle="pill" data-bs-target="#pills-calendar" type="button" role="tab"
    aria-controls="pills-calendar" aria-selected="true">
        {{__('admin.main_site.banners.calendar.tab_name')}}
    </button>
  </li>
  <li class="nav-item py-2 px-3" role="presentation">
    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab"
    aria-controls="pills-contact" aria-selected="true">
        {{__('admin.main_site.banners.contact.tab_name')}}
    </button>
  </li>
</ul>
<div class="tab-content px-3" id="pills-tab-bannerContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        <h3 class="admin-title"><b>{{__('admin.main_site.banners.home.title')}}</b></h3>
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.home.img_num_stats')}}</b></p>
            <img id="img_home_numstats" class="my-3 banner-img"  <?php
            if($bannerNumberAndStats !=''){
                echo 'src="   '.config('app.url').$bannerNumberAndStats.'"';
            }else{
                echo 'src="    '.asset('assets/img/default.jpg').'"';
            };?>/>
            <div class="my-3">
                <label class="custom-file-upload btn btn-black" for="numberAndStatsBanner" id="numberAndStatsTxt">
                {{__('admin.main_site.banners.btn_img')}}
                </label>
                <input type="file" class="text-center file-input" name="numberAndStatsBanner" id="numberAndStatsBanner"
                            onChange="bannerUP('4', 'img_home_numstats', 'numberAndStatsBanner', 'numberAndStatsTxt')">
            </div>
        </div>
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.home.img_about')}}</b></p>
            <img id="img_home_about" class="my-3 banner-img"  <?php
            if($bannerAbout !=''){
                echo 'src="   '.config('app.url').$bannerAbout.'"';
            }else{
                echo 'src="    '.asset('assets/img/default.jpg').'"';
            };?>/>
            <div class="my-3">
                <label class="custom-file-upload btn btn-black" for="aboutBanner" id="aboutTxt">
                {{__('admin.main_site.banners.btn_img')}}
                </label>
                <input type="file" class="text-center file-input" name="aboutBanner" id="aboutBanner"
                            onChange="bannerUP('2', 'img_home_about', 'aboutBanner', 'aboutTxt')">
            </div>
        </div>
    </div>


    <!--    bannerUP(section, destiny, origin, btnLabel)    -->
    <div class="tab-pane fade" id="pills-cities" role="tabpanel" aria-labelledby="pills-cities-tab">
        <h3 class="admin-title"><b>{{__('admin.main_site.banners.cities.title')}}</b></h3>

        <div id="tblBannerCity">
            @for($i=1; $i < count($bannerCities)+1; $i++)
            <!-- -->
            <div class="py-2" id="tblBannerCity<?= $i?>">
            <?php $s = $i - 1;?>
                <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
                <img class="my-3 banner-img" id="imgCity<?= $i?>" src="{{config('app.url').$bannerCities[$s]['banner']}}"/>
                <div class="row mx-0 px-0">
                    <div class="col-auto my-3 ps-0 position-relative">
                        <input type="file" class="inputImage" onChange="editBanner('<?= $i?>', 'city', '1', '<?= $bannerCities[$s]['id']?>')"
                                name="city_banner<?= $i?>" id="city_banner<?= $i?>">
                        <label class="custom-file-upload btn btn-black" for="city_banner">
                        {{__('admin.main_site.banners.btn_img')}}
                        </label>
                    </div>
                    <div class="col-auto my-3">
                        <button class="btn btn-danger" onclick="delBanner('<?= $i?>', 'city', '1', '<?= $bannerCities[$s]['id']?>')">
                                {{__('admin.main_site.banners.btn_delete')}}
                        </button>
                    </div>
                    <input type="hidden" id="delCity<?= $i?>" name="delCity<?= $i?>">
                </div>
            </div>
            <!-- -->
            @endfor
        </div>
        <input type="hidden" id="cantCity" value="<?php echo count($bannerCities)?>">
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
            <div class="mt-4 mb-3 banner-img new row mx-0">
                <div class="h-100 row mx-0 align-items-center text-center position-relative">
                    <input type="file" class="inputImage " style="height:100%" onChange="addBanner('city', '1')"
                        name="new_gallery_city" id="new_gallery_city">
                    <label class="custom-file-upload" for="new_gallery_img">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                    </label>
                </div>
            </div>
        </div>

    </div>

    <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
        <h3 class="admin-title"><b>{{__('admin.main_site.banners.about.title')}}</b></h3>
        <!-- -->
        <div id="tblBannerAbout">
            @for($i=1; $i < count($About)+1; $i++)
            <!-- -->
            <div class="py-2" id="tblBannerAbout<?= $i?>">
            <?php $s = $i - 1;?>
                <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
                <img class="my-3 banner-img" id="imgAbout<?= $i?>" src="{{config('app.url').$About[$s]['banner']}}"/>
                <div class="row mx-0 px-0">
                    <div class="col-auto my-3 ps-0 position-relative">
                        <input type="file" class="inputImage" onChange="editBanner('<?= $i?>', 'about', '6', '<?= $About[$s]['id']?>')"
                                name="about_banner<?= $i?>" id="about_banner<?= $i?>">
                        <label class="custom-file-upload btn btn-black" for="about_banner">
                        {{__('admin.main_site.banners.btn_img')}}
                        </label>
                    </div>
                    <div class="col-auto my-3">
                        <button class="btn btn-danger" onclick="delBanner('<?= $i?>', 'about', '6', '<?= $About[$s]['id']?>')">
                                {{__('admin.main_site.banners.btn_delete')}}
                        </button>
                    </div>
                    <input type="hidden" id="delAbout<?= $i?>" name="delAbout<?= $i?>">
                </div>
            </div>
            <!-- -->
            @endfor
        </div>
        <!-- -->
        <input type="hidden" id="cantAbout" value="<?php echo count($About)?>">
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
            <div class="mt-4 mb-3 banner-img new row mx-0">
                <div class="h-100 row mx-0 align-items-center text-center position-relative">
                    <input type="file" class="inputImage " style="height:100%" onChange="addBanner('about', '6')"
                        name="new_gallery_about" id="new_gallery_about">
                    <label class="custom-file-upload" for="new_gallery_img">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                    </label>
                </div>
            </div>
        </div>
        <!-- -->
    </div>




    <div class="tab-pane fade" id="pills-initiatives" role="tabpanel" aria-labelledby="pills-initiatives-tab">
        <h3 class="admin-title"><b>{{__('admin.main_site.banners.initiatives.title')}}</b></h3>
        <!-- -->
        <div id="tblBannerInitiatives">
            @for($i=1; $i < count($Initiatives)+1; $i++)
            <!-- -->
            <div class="py-2" id="tblBannerInitiatives<?= $i?>">
            <?php $s = $i - 1;?>
                <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
                <img class="my-3 banner-img" id="imgInitiatives<?= $i?>" src="{{config('app.url').$Initiatives[$s]['banner']}}"/>
                <div class="row mx-0 px-0">
                    <div class="col-auto my-3 ps-0 position-relative">
                        <input type="file" class="inputImage" onChange="editBanner('<?= $i?>', 'initiatives', '7', '<?= $Initiatives[$s]['id']?>')"
                                name="initiatives_banner<?= $i?>" id="initiatives_banner<?= $i?>">
                        <label class="custom-file-upload btn btn-black" for="initiatives_banner">
                        {{__('admin.main_site.banners.btn_img')}}
                        </label>
                    </div>
                    <div class="col-auto my-3">
                        <button class="btn btn-danger" onclick="delBanner('<?= $i?>', 'initiatives', '7', '<?= $Initiatives[$s]['id']?>')">
                                {{__('admin.main_site.banners.btn_delete')}}
                        </button>
                    </div>
                    <input type="hidden" id="delInitiatives<?= $i?>" name="delInitiatives<?= $i?>">
                </div>
            </div>
            <!-- -->
            @endfor
        </div>
        <!-- -->
        <input type="hidden" id="cantInitiatives" value="<?php echo count($Initiatives)?>">
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
            <div class="mt-4 mb-3 banner-img new row mx-0">
                <div class="h-100 row mx-0 align-items-center text-center position-relative">
                    <input type="file" class="inputImage " style="height:100%" onChange="addBanner('initiatives', '7')"
                        name="new_gallery_initiatives" id="new_gallery_initiatives">
                    <label class="custom-file-upload" for="new_gallery_img">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                    </label>
                </div>
            </div>
        </div>
        <!-- -->
    </div>

    <div class="tab-pane fade" id="pills-tastier_life" role="tabpanel" aria-labelledby="pills-tastier_life-tab">
        <h3 class="admin-title"><b>{{__('admin.main_site.banners.tastier_life.title')}}</b></h3>
        <!-- -->
        <div id="tblBannerTestier">
            @for($i=1; $i < count($Testier)+1; $i++)
            <!-- -->
            <div class="py-2" id="tblBannerTestier<?= $i?>">
            <?php $s = $i - 1;?>
                <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
                <img class="my-3 banner-img" id="imgTestier<?= $i?>" src="{{config('app.url').$Testier[$s]['banner']}}"/>
                <div class="row mx-0 px-0">
                    <div class="col-auto my-3 ps-0 position-relative">
                        <input type="file" class="inputImage" onChange="editBanner('<?= $i?>', 'testier', '8', '<?= $Testier[$s]['id']?>')"
                                name="testier_banner<?= $i?>" id="testier_banner<?= $i?>">
                        <label class="custom-file-upload btn btn-black" for="testier_banner">
                        {{__('admin.main_site.banners.btn_img')}}
                        </label>
                    </div>
                    <div class="col-auto my-3">
                        <button class="btn btn-danger" onclick="delBanner('<?= $i?>', 'testier', '8', '<?= $Testier[$s]['id']?>')">
                                {{__('admin.main_site.banners.btn_delete')}}
                        </button>
                    </div>
                    <input type="hidden" id="delTestier<?= $i?>" name="delTestier<?= $i?>">
                </div>
            </div>
            <!-- -->
            @endfor
        </div>
        <!-- -->
        <input type="hidden" id="cantTestier" value="<?php echo count($Testier)?>">
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
            <div class="mt-4 mb-3 banner-img new row mx-0">
                <div class="h-100 row mx-0 align-items-center text-center position-relative">
                    <input type="file" class="inputImage " style="height:100%" onChange="addBanner('testier', '8')"
                        name="new_gallery_testier" id="new_gallery_testier">
                    <label class="custom-file-upload" for="new_gallery_img">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                    </label>
                </div>
            </div>
        </div>
        <!-- -->

    </div>

    <div class="tab-pane fade" id="pills-tours" role="tabpanel" aria-labelledby="pills-tours-tab">
        <h3 class="admin-title"><b>{{__('admin.main_site.banners.tours.title')}}</b></h3>
        <!-- -->
        <div id="tblBannerTour">
            @for($i=1; $i < count($Tour)+1; $i++)
            <!-- -->
            <div class="py-2" id="tblBannerTour<?= $i?>">
            <?php $s = $i - 1;?>
                <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
                <img class="my-3 banner-img" id="imgTour<?= $i?>" src="{{config('app.url').$Tour[$s]['banner']}}"/>
                <div class="row mx-0 px-0">
                    <div class="col-auto my-3 ps-0 position-relative">
                        <input type="file" class="inputImage" onChange="editBanner('<?= $i?>', 'tour', '9', '<?= $Tour[$s]['id']?>')"
                                name="tour_banner<?= $i?>" id="tour_banner<?= $i?>">
                        <label class="custom-file-upload btn btn-black" for="tour_banner">
                        {{__('admin.main_site.banners.btn_img')}}
                        </label>
                    </div>
                    <div class="col-auto my-3">
                        <button class="btn btn-danger" onclick="delBanner('<?= $i?>', 'tour', '9', '<?= $Tour[$s]['id']?>')">
                                {{__('admin.main_site.banners.btn_delete')}}
                        </button>
                    </div>
                    <input type="hidden" id="delTour<?= $i?>" name="delTour<?= $i?>">
                </div>
            </div>
            <!-- -->
            @endfor
        </div>
        <!-- -->
        <input type="hidden" id="cantTour" value="<?php echo count($Tour)?>">
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
            <div class="mt-4 mb-3 banner-img new row mx-0">
                <div class="h-100 row mx-0 align-items-center text-center position-relative">
                    <input type="file" class="inputImage " style="height:100%" onChange="addBanner('tour', '9')"
                        name="new_gallery_tour" id="new_gallery_tour">
                    <label class="custom-file-upload" for="new_gallery_img">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                    </label>
                </div>
            </div>
        </div>
        <!-- -->
    </div>

    <div class="tab-pane fade" id="pills-calendar" role="tabpanel" aria-labelledby="pills-calendar-tab">
        <h3 class="admin-title"><b>{{__('admin.main_site.banners.calendar.title')}}</b></h3>
        <!-- -->
        <div id="tblBannerCalendar">
            @for($i=1; $i < count($Calendar)+1; $i++)
            <!-- -->
            <div class="py-2" id="tblBannerCalendar<?= $i?>">
            <?php $s = $i - 1;?>
                <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
                <img class="my-3 banner-img" id="imgCalendar<?= $i?>" src="{{config('app.url').$Calendar[$s]['banner']}}"/>
                <div class="row mx-0 px-0">
                    <div class="col-auto my-3 ps-0 position-relative">
                        <input type="file" class="inputImage" onChange="editBanner('<?= $i?>', 'calendar', '10', '<?= $Calendar[$s]['id']?>')"
                                name="calendar_banner<?= $i?>" id="calendar_banner<?= $i?>">
                        <label class="custom-file-upload btn btn-black" for="calendar_banner">
                        {{__('admin.main_site.banners.btn_img')}}
                        </label>
                    </div>
                    <div class="col-auto my-3">
                        <button class="btn btn-danger" onclick="delBanner('<?= $i?>', 'calendar', '10', '<?= $Calendar[$s]['id']?>')">
                                {{__('admin.main_site.banners.btn_delete')}}
                        </button>
                    </div>
                    <input type="hidden" id="delCalendar<?= $i?>" name="delCalendar<?= $i?>">
                </div>
            </div>
            <!-- -->
            @endfor
        </div>
        <!-- -->
        <input type="hidden" id="cantCalendar" value="<?php echo count($Calendar)?>">
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
            <div class="mt-4 mb-3 banner-img new row mx-0">
                <div class="h-100 row mx-0 align-items-center text-center position-relative">
                    <input type="file" class="inputImage " style="height:100%" onChange="addBanner('calendar', '10')"
                        name="new_gallery_calendar" id="new_gallery_calendar">
                    <label class="custom-file-upload" for="new_gallery_img">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                    </label>
                </div>
            </div>
        </div>
        <!-- -->
    </div>

    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <h3 class="admin-title"><b>{{__('admin.main_site.banners.contact.title')}}</b></h3>
        <!-- -->
        <div id="tblBannerContact">
            @for($i=1; $i < count($Contact)+1; $i++)
            <!-- -->
            <div class="py-2" id="tblBannerContact<?= $i?>">
            <?php $s = $i - 1;?>
                <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
                <img class="my-3 banner-img" id="imgContact<?= $i?>" src="{{config('app.url').$Contact[$s]['banner']}}"/>
                <div class="row mx-0 px-0">
                    <div class="col-auto my-3 ps-0 position-relative">
                        <input type="file" class="inputImage" onChange="editBanner('<?= $i?>', 'contact', '11', '<?= $Contact[$s]['id']?>')"
                                name="contact_banner<?= $i?>" id="contact_banner<?= $i?>">
                        <label class="custom-file-upload btn btn-black" for="contact_banner">
                        {{__('admin.main_site.banners.btn_img')}}
                        </label>
                    </div>
                    <div class="col-auto my-3">
                        <button class="btn btn-danger" onclick="delBanner('<?= $i?>', 'contact', '11', '<?= $Contact[$s]['id']?>')">
                                {{__('admin.main_site.banners.btn_delete')}}
                        </button>
                    </div>
                    <input type="hidden" id="delContact<?= $i?>" name="delContact<?= $i?>">
                </div>
            </div>
            <!-- -->
            @endfor
        </div>
        <!-- -->
        <input type="hidden" id="cantContact" value="<?php echo count($Contact)?>">
        <div class="py-2">
            <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
            <div class="mt-4 mb-3 banner-img new row mx-0">
                <div class="h-100 row mx-0 align-items-center text-center position-relative">
                    <input type="file" class="inputImage " style="height:100%" onChange="addBanner('contact', '11')"
                        name="new_gallery_contact" id="new_gallery_contact">
                    <label class="custom-file-upload" for="new_gallery_img">
                        <img class="mx-auto" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/>
                    </label>
                </div>
            </div>
        </div>
        <!-- -->
    </div>
</div>



            <!-- -->
            <div class="py-2" id="tblBanner0" style="display:none">
                <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
                <img class="my-3 banner-img" id="imgCity0" src="{{asset('assets/img/Banners/IMG_Cities.png')}}"/>
                <div class="row mx-0 px-0">
                    <div class="col-auto my-3 ps-0 position-relative">
                        <input type="file" class="inputImage" name="city_banner" id="city_banner">
                        <label class="custom-file-upload btn btn-black" for="city_banner">
                        {{__('admin.main_site.banners.btn_img')}}
                        </label>
                    </div>
                    <div class="col-auto my-3">
                        <button class="btn btn-danger">{{__('admin.main_site.banners.btn_delete')}}</button>
                    </div>
                    <input type="hidden" id="delCity0">
                </div>
            </div>
            <!-- -->
<script>

        function editBanner(item, sectionName, sectionId, idItem){

                let capit = sectionName.charAt(0).toUpperCase() + sectionName.slice(1);

            if (confirm("Confirm that you want to change the banner") == true) {
                if(idItem != ''){

                    let token = document.getElementsByName("_token")[0].value;
                    let files = $('#'+sectionName+'_banner'+item)[0].files[0];
                    let datos = new FormData();
                    datos.append('idBanner', idItem);
                    datos.append('_token', token);
                    datos.append('banner', files)
                    $.ajax({
                                    type: 'POST',
                                    url: '/admin/bannerChange',
                                    data: datos,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend: function(){
                                        $('.submitBtn').attr("disabled","disabled");
                                        //$('#fupForm').css("opacity",".5");
                                    },
                                    success: function(msg){

                                        sel_file('img' + capit + item, sectionName+'_banner'+item );
                                        localStorage.setItem('message', 'Image was successfully changed');
                                        //window.location ='/admin/cities/';
                                        alert("Image was successfully changed");
                                        //document.getElementById("btnSubmit").disabled = false;
                                    }
                    });
                };
                //document.getElementById(idtbl).style.display = 'none';
            };
        }

        function delBanner(item, sectionName, sectionId, idItem){
            if (confirm("Confirm that you want to remove the banner") == true) {
                if(idItem != ''){

                    let token = document.getElementsByName("_token")[0].value;
                    let datos = new FormData();
                    datos.append('idBanner', idItem);
                    datos.append('_token', token);
                    $.ajax({
                                    type: 'POST',
                                    url: '/admin/bannerDelete',
                                    data: datos,
                                    contentType: false,
                                    cache: false,
                                    processData:false,
                                    beforeSend: function(){
                                        $('.submitBtn').attr("disabled","disabled");
                                        //$('#fupForm').css("opacity",".5");
                                    },
                                    success: function(msg){
                                        localStorage.setItem('message', 'Image was successfully delete');
                                        //window.location ='/admin/cities/';
                                        alert("Image was successfully delete");
                                        //document.getElementById("btnSubmit").disabled = false;
                                    }
                    });
                };
                let capit = sectionName.charAt(0).toUpperCase() + sectionName.slice(1);
                let idtbl = 'tblBanner' + capit + item;
                let tbl = document.getElementById(idtbl).style.display = 'none';
            };
        }

        function addBanner(sectionName, sectionId){
            let token = document.getElementsByName("_token")[0].value;
            //document.getElementById(origin)
            //document.getElementById(btnLabel) = 'custom-file-upload btn btn-black';
            ///////////////////////////////////////
            let datos = new FormData();
                let files = $('#'+'new_gallery_'+sectionName)[0].files[0];
                datos.append('idSection', sectionId)
                datos.append('banner', files)
                datos.append('idOwner', '0')
                datos.append('_token', token)
            $.ajax({
                            type: 'POST',
                            url: '/admin/bannerUpdate',
                            data: datos,
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function(){
                                $('.submitBtn').attr("disabled","disabled");
                                //$('#fupForm').css("opacity",".5");
                            },
                            success: function(msg){
                                addItem(sectionName, sectionId);
                                localStorage.setItem('message', 'Image was successfully added');
                                //window.location ='/admin/cities/';
                                alert("Image was successfully saved");
                                //document.getElementById("btnSubmit").disabled = false;
                            }
            });
        }

        function addItem(sectionName, sectionId){
            //tblBannerCity -->destiny
            //tblBanner0 --> plantilla
            let capit = sectionName.charAt(0).toUpperCase() + sectionName.slice(1);
            let destiny = 'tblBanner' + capit;

            let idCantidad = 'cant'+capit;
            let cantidad = document.getElementById(idCantidad).value;
            cantidad = parseInt(cantidad);


            nuevovalor = cantidad + 1;
            let nuevaid = destiny+nuevovalor;

                let clonedDiv = $('#tblBanner0').clone();
                clonedDiv.attr("id", nuevaid); // Cambio id
                $('#'+destiny).append(clonedDiv);// lo coloco en este div

                let padre = document.getElementById(nuevaid).getElementsByTagName("input");
                padre[0].id = sectionName + '_banner' + nuevovalor;
                padre[0].name = sectionName + '_banner' + nuevovalor;
                let jss1 = "editBanner('"+nuevovalor+"', '"+sectionName+"', '"+sectionId+"')";
                padre[0].setAttribute("onclick", jss1);
                //delCity0
                padre[1].id = 'del' + capit + nuevovalor;;
                padre[1].name = 'del' + capit + nuevovalor;;

                let padre2 = document.getElementById(nuevaid).getElementsByTagName("img");
                padre2[0].id = 'img' + capit + nuevovalor;

                let padre3 = document.getElementById(nuevaid).getElementsByTagName("button");
                let jss2 = "delBanner('"+nuevovalor+"', '"+sectionName+"', '"+sectionId+"', '')";
                padre3[0].setAttribute("onclick", jss2);
                //imgCity0

                //input file new_gallery_city
                sel_file('img' + capit + nuevovalor, 'new_gallery_'+sectionName );

                document.getElementById(nuevaid).style.display = '';
                document.getElementById(idCantidad).value =nuevovalor;
        }

        function bannerUP(section, destiny, origin, btnLabel){
            sel_file(destiny, origin);
            let token = document.getElementsByName("_token")[0].value;
            //document.getElementById(origin)
            //document.getElementById(btnLabel) = 'custom-file-upload btn btn-black';
            ///////////////////////////////////////
            let datos = new FormData();
                let files = $('#'+origin)[0].files[0];
                datos.append('idSection', section)
                datos.append('banner', files)
                datos.append('idOwner', '0')
                datos.append('_token', token)
            $.ajax({
                            type: 'POST',
                            url: '/admin/bannerUpdate',
                            data: datos,
                            contentType: false,
                            cache: false,
                            processData:false,
                            beforeSend: function(){
                                $('.submitBtn').attr("disabled","disabled");
                                //$('#fupForm').css("opacity",".5");
                            },
                            success: function(msg){
                                localStorage.setItem('message', 'Image was successfully edited');
                                //window.location ='/admin/cities/';
                                alert("Image was successfully saved");
                                //document.getElementById("btnSubmit").disabled = false;
                            }
            });
        }
</script>

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
        <img id="img_home_numstats" class="my-3 banner-img" src="{{asset('assets/img/Home/sample.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.home.img_about')}}</b></p>
        <img id="img_home_about" class="my-3 banner-img" src="{{asset('assets/img/Home/sample.png')}}"/>
        <br/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
  </div>
  <div class="tab-pane fade" id="pills-cities" role="tabpanel" aria-labelledby="pills-cities-tab">
    <h3 class="admin-title"><b>{{__('admin.main_site.banners.cities.title')}}</b></h3>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Cities.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Cities.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button>
        <button class="my-3 btn btn-danger">{{__('admin.main_site.banners.btn_delete')}}</button>
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <div class="mt-4 mb-3 banner-img new row mx-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <img class="" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/></div>
            </div>
        </div>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_upload')}}</button>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
    <h3 class="admin-title"><b>{{__('admin.main_site.banners.about.title')}}</b></h3>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_About.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_About.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button>
        <button class="my-3 btn btn-danger">{{__('admin.main_site.banners.btn_delete')}}</button>
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <div class="mt-4 mb-3 banner-img new row mx-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <img class="" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/></div>
            </div>
        </div>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_upload')}}</button>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-initiatives" role="tabpanel" aria-labelledby="pills-initiatives-tab">
    <h3 class="admin-title"><b>{{__('admin.main_site.banners.initiatives.title')}}</b></h3>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Initiatives.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Initiatives.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button>
        <button class="my-3 btn btn-danger">{{__('admin.main_site.banners.btn_delete')}}</button>
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <div class="mt-4 mb-3 banner-img new row mx-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <img class="" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/></div>
            </div>
        </div>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_upload')}}</button>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-tastier_life" role="tabpanel" aria-labelledby="pills-tastier_life-tab">
    <h3 class="admin-title"><b>{{__('admin.main_site.banners.tastier_life.title')}}</b></h3>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_TastierLife.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_TastierLife.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button>
        <button class="my-3 btn btn-danger">{{__('admin.main_site.banners.btn_delete')}}</button>
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <div class="mt-4 mb-3 banner-img new row mx-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <img class="" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/></div>
            </div>
        </div>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_upload')}}</button>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-tours" role="tabpanel" aria-labelledby="pills-tours-tab">
    <h3 class="admin-title"><b>{{__('admin.main_site.banners.tours.title')}}</b></h3>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Tours.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Tours.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button>
        <button class="my-3 btn btn-danger">{{__('admin.main_site.banners.btn_delete')}}</button>
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <div class="mt-4 mb-3 banner-img new row mx-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <img class="" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/></div>
            </div>
        </div>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_upload')}}</button>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-calendar" role="tabpanel" aria-labelledby="pills-calendar-tab">
    <h3 class="admin-title"><b>{{__('admin.main_site.banners.calendar.title')}}</b></h3>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Calendar.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Calendar.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button>
        <button class="my-3 btn btn-danger">{{__('admin.main_site.banners.btn_delete')}}</button>
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <div class="mt-4 mb-3 banner-img new row mx-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <img class="" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/></div>
            </div>
        </div>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_upload')}}</button>
    </div>
  </div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
    <h3 class="admin-title"><b>{{__('admin.main_site.banners.contact.title')}}</b></h3>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Contact.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button class="btn btn-dark">
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <img class="my-3 banner-img" src="{{asset('assets/img/Banners/IMG_Contact.png')}}"/>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_img')}}</button>
        <button class="my-3 btn btn-danger">{{__('admin.main_site.banners.btn_delete')}}</button>
    </div>
    <div class="py-2">
        <p class="admin-subtitle my-3"><b>{{__('admin.main_site.banners.img_video')}}</b></p>
        <div class="mt-4 mb-3 banner-img new row mx-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-auto">
                <img class="" src="{{asset('assets/icons/add_file.png')}}" width="80" height="80"/></div>
            </div>
        </div>
        <button class="my-3 btn btn-black">{{__('admin.main_site.banners.btn_upload')}}</button>
    </div>
  </div>
</div>
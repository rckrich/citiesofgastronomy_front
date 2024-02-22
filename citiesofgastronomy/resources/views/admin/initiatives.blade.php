<!-- resources/views/admin/home.blade.php -->

@extends('commons.admin_base')

@section('content')
@csrf
<section id="admin_initiatives">
    <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-initiatives" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if($section==''){echo ' active';}?>" id="pills-init-tab" data-bs-toggle="pill" data-bs-target="#pills-init" type="button" role="tab" aria-controls="pills-init" aria-selected="true">{{__('initiatives.init.title')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if($section=='filters'){echo ' active';}?>" id="pills-filters-tab" data-bs-toggle="pill" data-bs-target="#pills-filters" type="button" role="tab" aria-controls="pills-filters" aria-selected="false">{{__('initiatives.filters.title')}}</button>
        </li>
    </ul>
    <div class="tab-content px-5" id="pills-tab-initiativesContent">
        <div class="tab-pane fade  <?php if($section==''){echo 'show active';}?>" id="pills-init" role="tabpanel" aria-labelledby="pills-init-tab">
            <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
                <div class="row mx-0">
                    <div class="col-12 px-0 py-2">
                        <h3 class="admin-title"><b>{{__('initiatives.init.admin_title')}}</b></h3>
                    </div>
                    <div class="col-12 px-0 text-right row mx-0 py-2">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 px-2 ms-0 ms-lg-auto ms-md-auto">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                            <input name="search_box" class="form-control me-2" type="search" placeholder="{{__('initiatives.init.search_ph')}}" aria-label="{{__('initiatives.init.search_ph')}}" aria-describedby="basic-addon1">
                        </div>
                        </div>
                    </div>
                    <div class="row col-12 px-0 py-2">
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <a class="btn btn-primary mx-auto" href="{{route('admin.initiatives_new')}}">{{__('initiatives.init.btn_add')}}</a>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 form-group">
                            <select id="select_sdg_filter" class="form-control h-100">
                                <option>{{__('initiatives.init.select_sdg')}}</option>
                            </select>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 form-group">
                            <select id="select_topic_filter" class="form-control h-100">
                                <option>{{__('initiatives.init.select_topic')}}</option>
                            </select>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 form-group">
                            <select id="select_connection_filter" class="form-control h-100">
                                <option>{{__('initiatives.init.select_connection')}}</option>
                            </select>
                        </div>
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 form-group">
                            <select id="select_activity_filter" class="form-control h-100">
                                <option>{{__('initiatives.init.select_activity')}}</option>
                            </select>
                        </div>


                    </div>
                </div>
                <div class="alert alert-success" role="alert" id="alertMessage" style="display:none">
                    Initiative was successfully created
                </div>
                <div class="row mx-0 pt-4">
                    <table class="table table-fixed">
                        <thead class="">
                            <tr>
                                <th class="col-8">{{__('initiatives.init.th_name')}}</th>
                                <th class="col-auto"></th>
                                <th class="col-auto"></th>
                            </tr>
                        </thead>
                        <tbody class="">
                            @foreach($initiatives AS $item)
                            <tr class="align-items-center">
                                <td class="col-8">{{$item["name"]}}</td>
                                <td class="col-auto my-auto">
                                    <a class="btn btn-link" href="{{route('admin.initiatives_edit',['id'=>1])}}">{{__('contact.admin.btn_edit')}}</a>
                                </td>
                                <td class="col-auto my-auto">
                                    <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteInitiativeModal">{{__('admin.btn_delete')}}
                                </button></td>
                            </tr>
                            @endforeach
                            @if( count ($initiatives) == 0)
                            <tr class="align-items-center">
                                <td class="col-8">{{__('general.no_results')}}</td>
                                <td class="col-auto"></td>
                                <td class="col-auto"></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" onclick="paginator('prev')">Previous</a></li>
                            @for($i=1;$i < $paginator +1; $i++)
                            <li class="page-item"><a class="page-link" onclick="paginator('<?= $i?>')"><?= $i?></a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" onclick="paginator('next')">Next</a></li>

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="tab-pane fade <?php if($section=='filters'){echo 'show active';}?>" id="pills-filters" role="tabpanel" aria-labelledby="pills-filters-tab">
        <ul class="nav nav-pills mb-3 py-2" id="pills-tab-filters" role="tablist">
            <li class="nav-item py-2 px-3 <?php if($sub=='actype'){echo ' active';}?>" role="presentation">
                <button class="nav-link <?php if($sub=='actype'){echo ' active';}?>" id="pills-activityType-tab" data-bs-toggle="pill" data-bs-target="#pills-activityType" type="button" role="tab"
                aria-controls="pills-activityType" aria-selected="<?php if($sub==''){echo 'true';}else{echo 'false" tabindex="-1';}?>">
                    {{__('initiatives.filters.tab_type')}}
                </button>
            </li>
            <li class="nav-item py-2 px-3 <?php if($sub=='topics'){echo ' active';}?>" role="presentation">
                <button class="nav-link <?php if($sub=='topics'){echo ' active';}?>" id="pills-topics-tab" data-bs-toggle="pill" data-bs-target="#pills-topics" type="button" role="tab"
                aria-controls="pills-topics" aria-selected="<?php if($sub=='topics'){echo 'true';}else{echo 'false" tabindex="-1';}?>">
                    {{__('initiatives.filters.tab_topic')}}
                </button>
            </li>
            <li class="nav-item py-2 px-3 <?php if($sub=='sdg'){echo ' active';}?>" role="presentation">
                <button class="nav-link <?php if($sub=='sdg'){echo ' active';}?>" id="pills-sdg-tab" data-bs-toggle="pill" data-bs-target="#pills-sdg" type="button" role="tab"
                aria-controls="pills-sdg" aria-selected="<?php if($sub=='sdg'){echo 'true';}else{echo 'false" tabindex="-1';}?>">
                    {{__('initiatives.filters.tab_sdg')}}
                </button>
            </li>
            <li class="nav-item py-2 px-3 <?php if($sub=='connections'){echo ' active';}?>" role="presentation">
                <button class="nav-link <?php if($sub=='connections'){echo ' active';}?>" id="pills-connections-tab" data-bs-toggle="pill" data-bs-target="#pills-connections" type="button" role="tab"
                aria-controls="pills-connections" aria-selected="<?php if($sub=='connections'){echo 'true';}else{echo 'false" tabindex="-1';}?>">
                    {{__('initiatives.filters.tab_connection')}}
                </button>
            </li>
        </ul>
        <div class="tab-content px-3" id="pills-tab-filtersContent">
            <div class="tab-pane fade <?php if($sub=='actype'){echo 'show active';}?>" id="pills-activityType" role="tabpanel" aria-labelledby="pills-activityType-tab">
                @include('initiatives.activity_types')
            </div>
            <div class="tab-pane fade <?php if($sub=='topics'){echo 'show active';}?>" id="pills-topics" role="tabpanel" aria-labelledby="pills-topics-tab">
                @include('initiatives.topics')
            </div>
            <div class="tab-pane fade <?php if($sub=='sdg'){echo 'show active';}?>" id="pills-sdg" role="tabpanel" aria-labelledby="pills-sdg-tab">
                @include('initiatives.sdg')
            </div>
            <div class="tab-pane fade <?php if($sub=='connections'){echo 'show active';}?>" id="pills-connections" role="tabpanel" aria-labelledby="pills-connections-tab">
                @include('initiatives.connections')
            </div>
        </div>
        </div>
    </div>
    </section>

    <!-- Modal DELETE INITIATIVE-->
<div class="modal fade" id="deleteInitiativeModal" tabindex="-1" aria-labelledby="deleteInitiativeModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteInitiativeModalLabel">{{__('initiatives.admin.delete_modal_title')}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <p>{{__('initiatives.admin.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary">{{__('admin.btn_delete')}}</button>
      </div>
    </div>
  </div>
</div>


<script>

    var editModal_type; var modalToggle_type;
    var editModal_topic; var modalToggle_topic;
    var editModal_sdg; var modalToggle_sdg;
    var editModal_connection; var modalToggle_connection;

    $(document).ready(function(e){
        editModal_type = new bootstrap.Modal('#editActivityModal', { keyboard: false    });
        modalToggle_type = document.getElementById("editActivityModal");
        //
        editModal_topic = new bootstrap.Modal('#editTopicModal', { keyboard: false    });
        modalToggle_topic = document.getElementById("editTopicModal");
        //
        editModal_sdg = new bootstrap.Modal('#editSDGModal', { keyboard: false    });
        modalToggle_sdg = document.getElementById("editSDGModal");
        //
        editModal_connection = new bootstrap.Modal('#editConnectionModal', { keyboard: false    });
        modalToggle_connection = document.getElementById("editConnectionModal");
        //
    });


    let message = localStorage.getItem('messageIniciative');
    console.log("##message");
    console.log(message);
    if(message){
        console.log("Local Storage DELETE");
            localStorage.removeItem('messageIniciative');
            document.getElementById('alertMessage').innerHTML = message;
            document.getElementById('alertMessage').style.display = 'block';
            setTimeout(() => {
                console.log("Delayed for 1 second.");
                document.getElementById('alertMessage').style.display = 'none';
            },5000);
    };


    //////////////////////////////////////////////

    function paginator(page){
        let search = document.getElementById('search_box').value;
        let paginatorCant = '<?= $paginator?>';
        paginatorCant = parseInt(paginatorCant);
        //search_box
        //console.log("-->PAG");
        let paginaActual = document.getElementById('pageActual').value;
        paginaActual= parseInt(paginaActual);
        if (search != ''){
            paginaActual = document.getElementById('page').value;
            paginaActual= parseInt(paginaActual);
        };

        let nada = '';
        if(page == 'prev' || page == 'next'){
                //console.log("#0");
            if(page == 'next' && paginaActual != paginatorCant){
                page = paginaActual + 1;
                //console.log("#1");
            }else if(page == 'prev' && paginaActual > 1){
                page = paginaActual - 1;
                //console.log("#2");
            }else{
                nada = 'si';
            };
        }else{
            page= parseInt(page);
        };
        //console.log(paginaActual);
        //console.log(page);
        if(nada == ''){
            if (search == ''){
                console.log("#not SERCH");
                window.location = '/admin/initiatives/?page='+page;
            }else{
                //window.location = '/admin/initiatives/?page='+paginaActual;
                document.getElementById('page').value = page;
                document.getElementById('formSearchInitiative').submit();
            };
        };
    }

</script>
@endsection

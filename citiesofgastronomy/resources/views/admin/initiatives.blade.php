<!-- resources/views/admin/home.blade.php -->

@extends('commons.admin_base')

@section('content')
@csrf
<section id="admin_initiatives">
    <ul class="nav nav-pills mb-3 px-5 pt-5 pb-4" id="pills-tab-initiatives" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if($section=='in'){echo ' active';}?>" id="pills-init-tab" data-bs-toggle="pill" data-bs-target="#pills-init" type="button" role="tab" aria-controls="pills-init" aria-selected="true">{{__('initiatives.init.title')}}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link <?php if($section=='filters'){echo ' active';}?>" id="pills-filters-tab" data-bs-toggle="pill" data-bs-target="#pills-filters" type="button" role="tab" aria-controls="pills-filters" aria-selected="false">{{__('initiatives.filters.title')}}</button>
        </li>
    </ul>
    <div class="tab-content px-5" id="pills-tab-initiativesContent">
        <div class="tab-pane fade  <?php if($section=='in'){echo 'show active';}?>" id="pills-init" role="tabpanel" aria-labelledby="pills-init-tab">
            <div id="" class="container p-lg-5 p-md-5 p-sm-3 p-3">
                <div class="row mx-0">
                    <div class="col-12 px-0 py-2">
                        <h3 class="admin-title"><b>{{__('initiatives.init.admin_title')}}</b></h3>
                    </div>                        

                    <form action="{{'/admin/initiatives/?section=in&page='.$page}}" method="POST" id="searchForm_ini">
                    <div class="col-12 px-0 text-right row mx-0 py-2">
                        <div class="col-lg-4 col-md-6 col-sm-12 col-12 ps-2 pe-0 ms-0 ms-lg-auto ms-md-auto">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-text" id="search_initiative_label"><img src="{{asset('assets/icons/search_dark.svg')}}"/></span>
                            <input id="search_box" name="search_box" value="<?php if($section=='in'){echo $search_box;}?>" class="form-control" type="search" placeholder="{{__('initiatives.init.search_ph')}}" aria-label="{{__('initiatives.init.search_ph')}}" aria-describedby="search_initiative_label">
                            <input type="hidden" id="page" name="page" value="<?php if($search_box!=''){echo  $page;}else{echo '1';};?>">
                        </div>
                        
                        <input type="hidden" id="pageActual" name="pageActual" value="<?php echo  $page?>">
                        </div>
                    </div>
                    <div class="row px-0 py-2">                         

                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2">
                            <a class="btn btn-primary mx-auto w-100" href="{{route('admin.initiatives_new')}}">{{__('initiatives.init.btn_add')}}</a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12 px-2 form-group ms-auto">
                            <select name="select_activity_filter" id="select_activity_filter" class="form-control filter-select">
                                <option <?php if($search_inputs['actype']=='default'){echo 'selected';}?> 
                                value="default">{{__('initiatives.init.select_activity')}}</option>
                                @foreach($typeOfActivity as $actype)
                                <option id="filter-{{$actype['id']}}" name="filter-{{$actype['id']}}" <?php if($search_inputs['actype']==$actype['id']){echo 'selected';}?> 
                                value="{{$actype['id']}}">{{$actype['id']}} - {{$actype['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12 px-2 form-group">
                            <select name="select_topic_filter" id="select_topic_filter" class="form-control filter-select">
                                <option <?php if($search_inputs['topic']=='default'){echo 'selected';}?>  
                                value="default">{{__('initiatives.init.select_topic')}}</option>
                                @foreach($Topics as $topic)
                                <option id="filter-{{$topic['id']}}" name="filter-{{$topic['id']}}" <?php if($search_inputs['topic']==$topic['id']){echo 'selected';}?> 
                                value="{{$topic['id']}}">{{$topic['id']}} - {{$topic['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12 px-2 form-group">
                            <select name="select_sdg_filter" id="select_sdg_filter" class="form-control filter-select">
                                <option <?php if($search_inputs['sdg']=='default'){echo 'selected';}?>  
                                value="default">{{__('initiatives.init.select_sdg')}}</option>
                                @foreach($sdg as $sdgg)
                                <option id="filter-{{$sdgg['id']}}" name="filter-{{$sdgg['id']}}" <?php if($search_inputs['sdg']==$sdgg['id']){echo 'selected';}?> 
                                value="{{$sdgg['id']}}">{{$sdgg['id']}} - {{$sdgg['number']}} - {{$sdgg['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-12 px-2 form-group">
                            <select name="select_connection_filter" id="select_connection_filter" class="form-control filter-select">
                                <option <?php if($search_inputs['connection']=='default'){echo 'selected';}?> 
                                value="default">{{__('initiatives.init.select_connection')}}</option>
                                @foreach($ConnectionsToOther as $cn)
                                <option id="filter-{{$cn['id']}}" name="filter-{{$cn['id']}}" <?php if($search_inputs['connection']==$cn['id']){echo 'selected';}?>
                                value="{{$cn['id']}}">{{$cn['id']}} - {{$cn['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-lg-auto col-md-auto col-sm-12 col-12 px-2 form-group">
                            <button type="submit" class="btn btn-secondary btn-search w-100"><img src="{{asset('assets/icons/search.svg')}}"/></button>
                        </div>
                    </div>
                    <div id="clear-filters-btn" class="row d-none mt-3 text-right">
                        <div class="col-lg-2 col-md-4 col-sm-12 col-12 mb-3 mx-auto me-lg-0">
                            <label class="badge bg-blue text-white hover-pointer px-5 py-3 text-center" onclick="resetFilters()">
                                {{__('general.clear_filters')}}  X
                            </label>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="alert alert-success" role="alert" id="alertMessage" style="display:none">
                    Initiative was successfully created
                </div>
                <div class="alert alert-danger" role="alert" id="alertErrorMessage" style="display:none">
                    The initiative couldn’t be edited, please try again.
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
                                <a class="btn btn-link" href="{{route('admin.initiatives_edit',['id'=>$item['id']])}}">{{__('contact.admin.btn_edit')}}</a>
                                </td>
                                <td class="col-auto my-auto">
                                    <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteInitiativeModal" onclick="openDeleteModal_ini({{$item['id']}})">{{__('admin.btn_delete')}}
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
            <input type="hidden" id="delete_initiative_id">
            <p>{{__('initiatives.admin.delete_modal_desc')}}</p>
      </div>
      <div class="modal-footer b-none">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">{{__('admin.btn_cancel')}}</button>
        <button type="button" class="btn btn-primary" onclick="deleteInitiative()">{{__('admin.btn_delete')}}</button>
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

    $('#pills-init-tab').on('click',function(){window.location = '/admin/initiatives/?section=in&page=1'});
    $('#pills-filters-tab').on('click',function(){window.location = '/admin/initiatives?section=filters&sub=actype'});


    let message = localStorage.getItem('messageIniciative');
    let errorMessage = localStorage.getItem('errorIessageIniciative');
    //console.log(message);
    if(message){
        console.log("Local Storage DELETE");
            localStorage.removeItem('messageIniciative');
            document.getElementById('alertMessage').innerHTML = message;
            document.getElementById('alertMessage').style.display = 'block';
            setTimeout(() => {
                console.log("Delayed for 1 second.");
                document.getElementById('alertMessage').style.display = 'none';
            },10000);
    };
    if(errorMessage){
        console.log("Local Storage DELETE");
            localStorage.removeItem('errorIessageIniciative');
            document.getElementById('alertErrorMessage').innerHTML = errorMessage;
            document.getElementById('alertErrorMessage').style.display = 'block';
            setTimeout(() => {
                console.log("Delayed for 1 second.");
                document.getElementById('alertErrorMessage').style.display = 'none';
            },10000);
    };


    //////////////////////////////////////////////
    function paginator(page){
        let search = $("#search_box").val();
        let paginatorCant = '<?= $paginator?>';
        paginatorCant = parseInt(paginatorCant);
        console.log(paginatorCant)
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
                console.log("#not SEARCH");
                window.location = '/admin/initiatives/?section=in&page='+page;
            }else{
                //window.location = '/admin/initiatives/?page='+paginaActual;
                console.log("# SERCH");console.log(search);
                document.getElementById('page').value = page;
                document.getElementById('formSearchInitiative').submit();
            };
        };
    }


    function openDeleteModal_ini(id){
        document.getElementById("delete_initiative_id").value = id;
    }
    function deleteInitiative(){
        let datos = new FormData();
        let token = document.getElementsByName("_token")[0].value;
        datos.append('_token', token);
        let data_id = document.getElementById("delete_initiative_id").value;
        datos.append('id', data_id);
        let current_page = document.getElementById('page').value

        if(data_id){
            $.ajax({
                type: 'POST',
                url: '/admin/initiatives/delete',
                data: datos,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend: function(){},
                success: function(msg){
                    closeModal('deleteInitiativeModal');
                    if (msg.status===400) {
                        alert("Error: " + msg.message);
                    } 
                    else {
                        alert('{{trans('initiatives.delete_success')}}');
                        window.location = '../../admin/initiatives/?section=in&page='+current_page;
                    }
                }
            });
        }
    }
</script>

<script>
    $("#search_box").keypress(function (e) {
      var key = e.which;
      if(key == 13)  // the enter key code
      {
        let keyword = $("#search_box").val();
        let actype = $("#select_activity_filter").val();
        let topic = $("#select_topic_filter").val();
        let sdg = $("#select_sdg_filter").val();
        let connection = $("#select_connection_filter").val();
        
        if(keyword || actype || topic || sdg || connection){
            $('#searchForm_ini').submit();
        }
        else{
            window.location = '/admin/initiatives/?section=in&page='+page;
         }
      }
     });
</script>
@endsection
